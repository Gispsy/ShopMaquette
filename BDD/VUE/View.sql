create view ProFournis
AS
select ProNom, FouNom
from Produit
join Fournisseurs on Fournisseurs.FouId = Produit.FouId;

DROP VIEW IF EXISTS `ProFournis`;

call ProFournis;

create view Join_Pro_Cat_SouCat
AS
select ProNom, SctgNom, CtgNom
from Produit
join SousCategorie on SousCategorie.SctgId = Produit.SctgId
join Categorie on Categorie.CtgId = SousCategorie.CtgId;

DROP VIEW IF EXISTS `Join_Pro_Cat_SouCat`;

SELECT * FROM Join_Pro_Cat_SouCat;
call Join_Pro_Cat_SouCat;