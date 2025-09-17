CREATE TABLE produit 
(
id_Produit INT NOT NULL AUTO_INCREMENT,
nom VARCHAR (12) NOT NULL,
description VARCHAR (50) NULL,
stock INT NOT NULL,
prix FLOAT NOT NULL,
id_Marque INT NOT NULL,
id_Categorie INT NOT NULL,
CONSTRAINT PK_Produit PRIMARY KEY (id_Produit)
);

CREATE TABLE marque 
(
id_Marque INT NOT NULL AUTO_INCREMENT,
nom VARCHAR (12) NOT NULL,
CONSTRAINT PK_marque PRIMARY KEY (id_Marque)
);

CREATE TABLE categorie
(
id_Categorie INT NOT NULL AUTO_INCREMENT,
nom VARCHAR (12) NOT NULL,
CONSTRAINT PK_categorie PRIMARY KEY (id_categorie)
);

CREATE TABLE client 
(
id_Client INT NOT NULL AUTO_INCREMENT,
prenom VARCHAR (12) NOT NULL,
nom VARCHAR (12) NOT NULL,
email VARCHAR (30) NOT NULL,
CONSTRAINT PK_client PRIMARY KEY (id_Client)
);

CREATE TABLE panier 
(
id_Panier INT NOT NULL AUTO_INCREMENT,
quantite INT NOT NULL,
id_Client INT NOT NULL,
id_Produit INT NOT NULL,
CONSTRAINT PK_panier PRIMARY KEY (id_Panier)
);

CREATE TABLE commande
(
id_Commande INT NOT NULL AUTO_INCREMENT,
adresse VARCHAR (30) NOT NULL,
date_Commande DATE NOT NULL,
statut VARCHAR (20) NOT NULL,
total INT NOT NULL,
id_Client INT NOT NULL,
id_Produit INT NOT NULL,
CONSTRAINT PK_commande PRIMARY KEY (id_Commande),
CONSTRAINT CK_commande CHECK (lower(statut) IN ('en attente', 'en cours', 'terminé'))
);
