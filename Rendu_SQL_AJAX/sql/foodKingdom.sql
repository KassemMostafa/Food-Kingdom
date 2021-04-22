DROP DATABASE if EXISTS FoodKingdom;
CREATE DATABASE IF NOT EXISTS FoodKingdom CHARACTER SET utf8;

USE foodkingdom;

DROP TABLE if EXISTS produit;
DROP TABLE if EXISTS panier;
-- DROP TABLE if EXISTS utilisateur;

CREATE TABLE IF NOT EXISTS produit (
			alt VARCHAR(255) PRIMARY KEY NOT NULL,
			nom VARCHAR (255),
			categories VARCHAR (255),
			description VARCHAR(255),
			prix VARCHAR(255),
			stock INT,
			image VARCHAR(255)
			);

-- CREATE TABLE IF NOT EXISTS utilisateur(
			-- idUtilisateur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			-- user VARCHAR (128),
			-- mdp VARCHAR (128)
			-- );

CREATE TABLE IF NOT EXISTS panier(
			id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			utilisateur VARCHAR (128),
			idProduit VARCHAR(128),
			prix INT,
			qte INT,
			FOREIGN KEY (idProduit) REFERENCES produit(idProduit)
			);

