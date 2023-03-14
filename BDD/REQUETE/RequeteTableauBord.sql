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

SELECT FouNom, Fournisseurs.FouId, 
sum(Commande.BonTotalPrixHT) as TotalFournis
from Fournisseurs
JOIN Produit on Produit.FouId = Fournisseurs.FouId
JOIN Commande on Commande.ProId = Produit.ProId
GROUP BY FouNom