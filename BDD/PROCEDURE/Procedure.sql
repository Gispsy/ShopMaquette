--Procedure de commande en cours de livraison--

delimiter |
create procedure cmd_en_cours()
    begin
        select ComDateCommande, ComDateLivraison
        from Commande
        where ComDateCommande < CURRENT_DATE and ComDateLivraison > CURRENT_DATE;
    end |
delimiter ;

--Procedure moyen de la date de commande et date de facturation--

delimiter |
create procedure moyen_date()
    BEGIN
        select DATEDIFF(ComDateCommande, BonDateFactu) as Moyen_De_Livraison
        from Commande
        join Facture on Facture.ComId = Commande.ComId;
    end |
delimiter ; 