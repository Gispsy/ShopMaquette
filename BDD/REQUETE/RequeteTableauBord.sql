-- Active: 1677597816141@@127.0.0.1@3306@shopmaquette

--Tableau de bord--

--Chiffre d'affaire mois année sélectionnée-- Changer le 2022 avec une varible php--
DELIMITER $$

SELECT BonDateFactu, Commande.ComId, 
sum(Commande.BonTotalPrixHT) as Total
from Facture
join Commande on Commande.ComId = Facture.ComId
where year(BonDateFactu) = '2022'
GROUP BY month(BonDateFactu);

DELIMITER

--Chiffre d'affaire générer par un fournisseur--

SELECT FouNom, Fournisseurs.FouId, 
sum(Commande.BonTotalPrixHT) as TotalFournis
from Fournisseurs
JOIN Produit on Produit.FouId = Fournisseurs.FouId
JOIN Commande on Commande.ProId = Produit.ProId
GROUP BY FouNom

DELIMITER

--Top 10 produit les plus commandée--

select Produit.ProId, ProNom, FouNom, 
sum(ComQuantiter) as QteTotalCommander
FROM Fournisseurs
join Produit on Produit.FouId = Fournisseurs.FouId
join Commande on Commande.ProId = Produit.ProId
where year(ComDateLivraison) = '2022'
GROUP BY ProNom
order by sum(ComQuantiter) desc limit 10

DELIMITER

--Top 10 produit les plus rémunérateur--

select Produit.ProId, ProNom, FouNom,
sum(ComQuantiter*Produit.ProPrixPHUT) as ProduitBenef,
sum(BonPrixHT - ProPrixPHUT) as Marge
FROM Fournisseurs
join Produit on Produit.FouId = Fournisseurs.FouId
join Commande on Commande.ProId = Produit.ProId
where year(ComDateLivraison) = '2022'
GROUP BY ProNom
order by sum(ComQuantiter) desc limit 10

DELIMITER

--Top 10 clients en nombre de commande ou chiffres d'affaire--

select CliNom, 
count(ComId) as NombreCommande,
sum(ComQuantiter*Produit.ProPrixPHUT) as ProduitBenef
from Client
join Commande on Commande.CliID = Client.CliId
join Produit on Produit.ProId = Commande.ProId
group by CliNom
order by count(ComId) desc, ProduitBenef DESC
limit 10

DELIMITER

--Répartition des chiffre d'affaire par client--

select CliNom,
sum(ComQuantiter*Produit.ProPrixPHUT) as ChiffreAffaire
from Client
join Commande on Commande.CLiID = Client.CliId
join Produit on Produit.ProId = Commande.ProId
group by Client.CliType

DELIMITER

--Nombre de commande en cours--

select count(ComId) as NombreCommande
from Commande
where ComDateCommande < CURRENT_DATE and ComDateLivraison > CURRENT_DATE