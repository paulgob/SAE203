ALTER TABLE produit
ADD CONSTRAINT FK_marque_TO_produit
	FOREIGN KEY (id_Marque)
	REFERENCES marque(id_Marque) ;

ALTER TABLE produit
ADD CONSTRAINT FK_categorie_TO_produit
	FOREIGN KEY (id_Categorie)
	REFERENCES categorie(id_Categorie) ;

ALTER TABLE panier
ADD CONSTRAINT FK_client_TO_panier
	FOREIGN KEY (id_Client)
	REFERENCES client(id_Client) ;

ALTER TABLE panier
ADD CONSTRAINT FK_produit_TO_panier
	FOREIGN KEY (id_Produit)
	REFERENCES produit(id_Produit) ;

ALTER TABLE commande
ADD CONSTRAINT FK_client_TO_commande
	FOREIGN KEY (id_Client)
	REFERENCES client(id_Client) ;

ALTER TABLE commande
ADD CONSTRAINT FK_produit_TO_commande
	FOREIGN KEY (id_Produit)
	REFERENCES produit(id_Produit) ;
