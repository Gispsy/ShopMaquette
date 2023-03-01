DROP DATABASE IF EXISTS `shopmaquette`;

CREATE DATABASE `shopmaquette`;

USE `shopmaquette`;

CREATE TABLE Fournisseurs(
    FouId                   INT AUTO_INCREMENT NOT NULL,
    FouNom                  VARCHAR(50) NOT NULL,
    FouAdresse              VARCHAR(255) NOT NULL,
    FouVille                VARCHAR(50) NOT NULL,
    FouCp                   VARCHAR(8) NOT NULL,
    FouPays                 VARCHAR(100) NOT NULL,
    FouRef                  VARCHAR(50) NOT NULL,
    PRIMARY KEY(FouId)
);

CREATE TABLE Categorie(
    CtgId               INT AUTO_INCREMENT NOT NULL,
    CtgNom              VARCHAR(50) NOT NULL,
    PRIMARY KEY(CtgId)
);

CREATE TABLE SousCategorie(
    SctgId              INT AUTO_INCREMENT NOT NULL,
    SctgNom             VARCHAR(50) NOT NULL,
    CtgId               INT,
    PRIMARY KEY(SctgId),
    FOREIGN KEY(CtgId) REFERENCES Categorie(CtgId)
);

CREATE TABLE Produit(
    ProId               INT AUTO_INCREMENT NOT NULL,
    FouId               INT,
    ProNom              VARCHAR(255) NOT NULL,
    ProQuantiter        INT NOT NULL, 
    ProDesc             VARCHAR(255) NOT NULL,
    ProPrixPHUT         DECIMAL(4,2) NOT NULL,
    SctgId              INT,
    PRIMARY KEY(ProId),
    FOREIGN KEY(FouId) REFERENCES Fournisseurs(FouId),
    FOREIGN KEY(SctgId) REFERENCES SousCategorie(SctgId)
);

CREATE TABLE Image(
    ImgId               INT AUTO_INCREMENT NOT NULL,
    ImgNom              VARCHAR(255) NOT NULL,
    ProId               INT,
    PRIMARY KEY(ImgId),
    FOREIGN KEY(ProId) REFERENCES Produit(ProId)
);

CREATE TABLE Client(
    CliId               INT AUTO_INCREMENT NOT NULL,
    CliNom              VARCHAR(50) NOT NULL,
    CliPrenom           VARCHAR(50) NOT NULL,
    CliAdresse          VARCHAR(255) NOT NULL,
    CliVille            VARCHAR(255) NOT NULL,
    CliPay s            VARCHAR(255) NOT NULL,
    CliCp               VARCHAR(8) NOT NULL,
    CliNumero           VARCHAR(20),
    CliAdresseMail      VARCHAR(50) NOT NULL,
    CliReference        VARCHAR(25) NOT NULL,
    CliType             BOOLEAN NOT NULL,
    CliCalucCoef        INT NOT NULL,
    PRIMARY KEY(CliId)
);

CREATE TABLE Employer(
    EmpId               INT AUTO_INCREMENT NOT NULL,
    EmpNom              VARCHAR(50) NOT NULL,
    EmpPrenom           VARCHAR(50) NOT NULL,
    EmpDateNaissance    DATE NOT NULL,
    EmpAdresse          VARCHAR(255) NOT NULL,
    EmpVille            VARCHAR(255) NOT NULL,
    EmpPays             VARCHAR(255) NOT NULL,
    EmpCp               VARCHAR(10) NOT NULL,
    EmpEquipe           BOOLEAN NOT NULL,
    CliId               INT,
    CliReference        VARCHAR(25),
    PRIMARY KEY(EmpId),
    FOREIGN KEY(CliId) REFERENCES Client(CliId)
);

CREATE TABLE Commande(
    ComId               INT AUTO_INCREMENT NOT NULL,
    ComRef              VARCHAR(50) NOT NULL,
    ComTVA              DECIMAL(5,2) NOT NULL,
    ComDateLivraison    DATE NOT NULL,
    ComDateCommande     DATE NOT NULL,
    ComAdresse          VARCHAR(255) NOT NULL,
    ComCp               VARCHAR(255) NOT NULL,
    ComVille            VARCHAR(255) NOT NULL,
    ComAdressFactu      VARCHAR(255) NOT NULL,
    BonDate             DATE NOT NULL,
    BonTVA              DECIMAL(5,2) NOT NULL,
    BonPrixHT           DECIMAL(15,2) NOT NULL,
    BonTotalPrixHT      DECIMAL(15,2) NOT NULL,
    BonTVATotal         VARCHAR(50) NOT NULL,
    CliType             BOOLEAN,
    CliID               INT,
    ComQuantiter        INT,
    ProId               INT NOT NULL,
    PRIMARY KEY(ComId, ProId),
    FOREIGN KEY(ProId) REFERENCES Produit(ProId),
    FOREIGN KEY(CliId) REFERENCES Client(CliId)
);

CREATE TABLE BonLivraison(
    BonLivId            INT AUTO_INCREMENT NOT NULL,
    BonLivClientNum     VARCHAR(20),
    BonLivClientMail    VARCHAR(50),
    BonLivClientRef     VARCHAR(50),
    BonLivClientNom     VARCHAR(50),
    BonLivClientAdresse VARCHAR(255),
    BonLivComAdresse    VARCHAR(50),
    BonLivComDate       DATE,
    BonLivComRef        VARCHAR(50),
    BonLivProduitRef    VARCHAR(50),
    BonLivProduitNom    VARCHAR(50),
    BonLivQuantiter     INT,
    ComId               INT NOT NULL,
    ProId               INT,
    CliID               INT,
    PRIMARY KEY(BonLivId, ProId),
    FOREIGN KEY(ComId) REFERENCES Commande(ComId),
    FOREIGN KEY(ProID) REFERENCES Produit(ProId),
    FOREIGN KEY(CliID) REFERENCES Client(CliID)
);

CREATE TABLE Facture(
    BonFactuId          INT AUTO_INCREMENT NOT NULL,
    BonDateFactu        DATE NOT NULL,
    ComId               INT,
    PRIMARY KEY(BonFactuId),
    FOREIGN KEY(ComId) REFERENCES Commande(ComId)
);