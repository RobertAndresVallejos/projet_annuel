-- Création d'une base de donnée
-- DROP DATABASE thatway_db;
CREATE DATABASE ThatWay_db;

USE ThatWay_db;

-- Création des tables

CREATE TABLE Categorie (
    id_Categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255)
);

CREATE TABLE Sous_Categorie (
    id_Sous_Categorie INT AUTO_INCREMENT PRIMARY KEY,
    id_Categorie INT,
    nom VARCHAR(255),
    FOREIGN KEY (id_Categorie) REFERENCES Categorie(id_Categorie)
);

CREATE TABLE Type_de_produit (
    id_Type_de_produit INT AUTO_INCREMENT PRIMARY KEY,
    id_Sous_Categorie INT,
    nom VARCHAR(255),
    FOREIGN KEY (id_Sous_Categorie) REFERENCES Sous_Categorie(id_Sous_Categorie)
);

CREATE TABLE Marque (
    id_Marque INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255)
);

CREATE TABLE Produit (
    id_Produit INT AUTO_INCREMENT PRIMARY KEY,
    id_Type_de_produit INT,
    id_Marque INT,
    nom VARCHAR(255),
    description TEXT,
    dimension VARCHAR(255),
    stock INT,
    couleur VARCHAR(255),
    taille VARCHAR(255),
    prix DECIMAL(10,2),  -- Colonne pour le prix avec deux chiffres après la virgule
    FOREIGN KEY (id_Type_de_produit) REFERENCES Type_de_produit(id_Type_de_produit),
    FOREIGN KEY (id_Marque) REFERENCES Marque(id_Marque)
);


CREATE TABLE Provenance (
    id_Provenance INT PRIMARY KEY,
    id_Produit INT,
    FOREIGN KEY (id_Produit) REFERENCES Produit(id_Produit)
);

CREATE TABLE Reduction (
    id_Reduction INT PRIMARY KEY,
    id_Produit INT,
    ValeurPourcentage DECIMAL(5,2),
    CodePromo VARCHAR(50),
    FOREIGN KEY (id_Produit) REFERENCES Produit(id_Produit)
);

CREATE TABLE connexion (
    id_connexion INT PRIMARY KEY,
    statut VARCHAR(50)
);

CREATE TABLE Type_CB (
    id_Type_CB INT PRIMARY KEY,
    nom VARCHAR(50)
);

CREATE TABLE Carte_Bancaire (
    id_cbancaire INT PRIMARY KEY,
    id_Type_CB INT,
    NumCarte VARCHAR(16),
    Titulaire VARCHAR(255),
    DateExpiration DATE,
    CryptoCarte VARCHAR(3),
    MemoCarte BOOLEAN,
    FOREIGN KEY (id_Type_CB) REFERENCES Type_CB(id_Type_CB)
);

CREATE TABLE client (
    id_Client INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cbancaire INT,
    id_connexion INT,
    role VARCHAR(255),
    nom VARCHAR(255),
    prenom VARCHAR(255),
    mot_de_passe VARCHAR(255),
    email VARCHAR(255),
    date_anniversaire DATE,
    adresse TEXT,
    code_postal VARCHAR(10),
    ville VARCHAR(255),
    pays VARCHAR(255),
    telephone VARCHAR(20),
    civilite VARCHAR(10),
    verification_token VARCHAR(255), -- Définir le type de données pour verification_token
    verified TINYINT(1) DEFAULT 0,
    FOREIGN KEY (id_cbancaire) REFERENCES Carte_Bancaire(id_cbancaire),
    FOREIGN KEY (id_connexion) REFERENCES connexion(id_connexion)
);


CREATE TABLE Avis (
    id_Avis INT PRIMARY KEY,
    id_Produit INT,
    id_Client INT,
    note INT,
    description TEXT,
    datePublication DATE,
    FOREIGN KEY (id_Produit) REFERENCES Produit(id_Produit),
    FOREIGN KEY (id_Client) REFERENCES client(id_Client)
);




CREATE TABLE creation_compte (
    id_creation_compte INT PRIMARY KEY,
    id_client INT,
    date_creation DATE,
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);



CREATE TABLE Commande (
    id_Commande INT PRIMARY KEY,
    id_Client INT,
    Recapitulatif_article TEXT,
    FOREIGN KEY (id_Client) REFERENCES client(id_Client)
);

CREATE TABLE LigneCommande (
    id_LigneCommande INT PRIMARY KEY,
    id_Commande INT,
    id_Produit INT,
    Quantite INT,
    FOREIGN KEY (id_Commande) REFERENCES Commande(id_Commande),
    FOREIGN KEY (id_Produit) REFERENCES Produit(id_Produit)
);

CREATE TABLE Paiement (
    id_Paiement INT PRIMARY KEY,
    id_Commande INT,
    id_Client INT,
    FOREIGN KEY (id_Commande) REFERENCES Commande(id_Commande),
    FOREIGN KEY (id_Client) REFERENCES client(id_Client)
);

CREATE TABLE Adresse_Livraison (
    id_Adresse_Livraison INT PRIMARY KEY,
    Nom VARCHAR(255),
    Prenom VARCHAR(255),
    Adresse TEXT,
    Ville VARCHAR(255),
    Code_Postal VARCHAR(10),
    Pays VARCHAR(255)
);

CREATE TABLE Type_Livraison (
    id_Type_Livraison INT PRIMARY KEY,
    Nom VARCHAR(255)
);

CREATE TABLE Livraison (
    id_Livraison INT PRIMARY KEY,
    id_Adresse_Livraison INT,
    Suivi_de_Livraison VARCHAR(255),
    FOREIGN KEY (id_Adresse_Livraison) REFERENCES Adresse_Livraison(id_Adresse_Livraison)
);

CREATE TABLE Panier (
    id_Panier INT PRIMARY KEY,
    id_article INT,
    nombre_article INT,
    FOREIGN KEY (id_article) REFERENCES Produit(id_Produit)
);

CREATE TABLE article (
    id_article INT PRIMARY KEY,
    couleur VARCHAR(50),
    taille VARCHAR(10),
    stock INT
);

CREATE TABLE Image (
    id_Image INT PRIMARY KEY,
    ImageArticle TEXT
);

CREATE TABLE Illustration (
    id_Illustration INT PRIMARY KEY,
    id_Image INT,
    FOREIGN KEY (id_Image) REFERENCES Image(id_Image)
);

CREATE TABLE Conseil_entretien (
    id_Conseil_entretien INT PRIMARY KEY,
    TemperatureLavage INT,
    TemperatureRepassage INT,
    SechageMachine BOOLEAN,
    NettoyageSec BOOLEAN
);

-- Création des relations (Table de jointure)

CREATE TABLE PosseTypeDeProduit (
    id_Type_de_produit INT,
    id_Produit INT,
    PRIMARY KEY (id_Type_de_produit, id_Produit),
    FOREIGN KEY (id_Type_de_produit) REFERENCES Type_de_produit(id_Type_de_produit),
    FOREIGN KEY (id_Produit) REFERENCES Produit(id_Produit)
);

CREATE TABLE CorrespondArticleProduit (
    id_article INT,
    id_Produit INT,
    PRIMARY KEY (id_article, id_Produit),
    FOREIGN KEY (id_article) REFERENCES article(id_article),
    FOREIGN KEY (id_Produit) REFERENCES Produit(id_Produit)
);

CREATE TABLE PossedeAvis (
    id_Avis INT,
    id_Produit INT,
    PRIMARY KEY (id_Avis, id_Produit),
    FOREIGN KEY (id_Avis) REFERENCES Avis(id_Avis),
    FOREIGN KEY (id_Produit) REFERENCES Produit(id_Produit)
);


CREATE TABLE PossedeConnexion (
    id_connexion INT,
    id_Client INT,
    PRIMARY KEY (id_connexion, id_Client),
    FOREIGN KEY (id_connexion) REFERENCES connexion(id_connexion),
    FOREIGN KEY (id_Client) REFERENCES client(id_Client)
);

CREATE TABLE PossedeCB (
    id_cbancaire INT,
    id_Client INT,
    PRIMARY KEY (id_cbancaire, id_Client),
    FOREIGN KEY (id_cbancaire) REFERENCES Carte_Bancaire(id_cbancaire),
    FOREIGN KEY (id_Client) REFERENCES client(id_Client)
);

CREATE TABLE PossedeLivraison (
    id_Livraison INT,
    id_Commande INT,
    PRIMARY KEY (id_Livraison, id_Commande),
    FOREIGN KEY (id_Livraison) REFERENCES Livraison(id_Livraison),
    FOREIGN KEY (id_Commande) REFERENCES Commande(id_Commande)
);

CREATE TABLE PossedeTypeLiv (
    id_Type_Livraison INT,
    id_Livraison INT,
    PRIMARY KEY (id_Type_Livraison, id_Livraison),
    FOREIGN KEY (id_Type_Livraison) REFERENCES Type_Livraison(id_Type_Livraison),
    FOREIGN KEY (id_Livraison) REFERENCES Livraison(id_Livraison)
);

CREATE TABLE PossedeActLiv (
    id_Adresse_Livraison INT,
    id_Livraison INT,
    PRIMARY KEY (id_Adresse_Livraison, id_Livraison),
    FOREIGN KEY (id_Adresse_Livraison) REFERENCES Adresse_Livraison(id_Adresse_Livraison),
    FOREIGN KEY (id_Livraison) REFERENCES Livraison(id_Livraison)
);

CREATE TABLE aProLigneCon (
    id_Produit INT,
    id_LigneCommande INT,
    PRIMARY KEY (id_Produit, id_LigneCommande),
    FOREIGN KEY (id_Produit) REFERENCES Produit(id_Produit),
    FOREIGN KEY (id_LigneCommande) REFERENCES LigneCommande(id_LigneCommande)
);

CREATE TABLE peut (
    id_Client INT,
    id_Commande INT,
    PRIMARY KEY (id_Client, id_Commande),
    FOREIGN KEY (id_Client) REFERENCES client(id_Client),
    FOREIGN KEY (id_Commande) REFERENCES Commande(id_Commande)
);

CREATE TABLE ComLigne (
    id_Commande INT,
    id_LigneCommande INT,
    PRIMARY KEY (id_Commande, id_LigneCommande),
    FOREIGN KEY (id_Commande) REFERENCES Commande(id_Commande),
    FOREIGN KEY (id_LigneCommande) REFERENCES LigneCommande(id_LigneCommande)
);

CREATE TABLE payer (
    id_Paiement INT,
    id_Commande INT,
    PRIMARY KEY (id_Paiement, id_Commande),
    FOREIGN KEY (id_Paiement) REFERENCES Paiement(id_Paiement),
    FOREIGN KEY (id_Commande) REFERENCES Commande(id_Commande)
);