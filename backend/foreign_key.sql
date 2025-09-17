ALTER TABLE commande
ADD CONSTRAINT  FOREIGN KEY (id_Client) REFERENCES client(id_Client);

ALTER TABLE commande
ADD CONSTRAINT FK_produit_TO_commande
	FOREIGN KEY (id_Produit)
	REFERENCES produit(id_Produit);

ALTER TABLE produit
ADD CONSTRAINT FK_categorie_TO_produit
	FOREIGN KEY (id_Categorie)
	REFERENCES categorie(id_Categorie);
