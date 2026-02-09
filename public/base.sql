CREATE DATABASE Takalo;
USE Takalo;

-- =========================
-- UTILISATEURS
-- =========================
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('utilisateur','admin') DEFAULT 'utilisateur',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- CATEGORIES
-- =========================
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL UNIQUE
);

-- =========================
-- OBJETS
-- proprietaire_id = utilisateur propriétaire
-- =========================
CREATE TABLE objets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    proprietaire_id INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    prix_estime DECIMAL(10,2) NOT NULL,
    categorie_id INT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (proprietaire_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

-- =========================
-- PHOTOS DES OBJETS
-- =========================
CREATE TABLE photos_objets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    objet_id INT NOT NULL,
    chemin_photo VARCHAR(255) NOT NULL,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (objet_id) REFERENCES objets(id)
        ON DELETE CASCADE
);

-- =========================
-- PROPOSITIONS D'ECHANGE
-- objet_propose_id : mon objet
-- objet_demande_id : objet de l'autre
-- =========================
CREATE TABLE echanges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_proposeur_id INT NOT NULL,
    utilisateur_receveur_id INT NOT NULL,
    objet_propose_id INT NOT NULL,
    objet_demande_id INT NOT NULL,
    statut ENUM('en_attente','accepte','refuse') DEFAULT 'en_attente',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_reponse TIMESTAMP NULL,

    FOREIGN KEY (utilisateur_proposeur_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (utilisateur_receveur_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (objet_propose_id) REFERENCES objets(id),
    FOREIGN KEY (objet_demande_id) REFERENCES objets(id)
);

-- =========================
-- HISTORIQUE DES PROPRIETAIRES
-- visible publiquement
-- =========================
CREATE TABLE historique_objets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    objet_id INT NOT NULL,
    utilisateur_id INT NOT NULL,
    echange_id INT NULL,
    date_changement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (objet_id) REFERENCES objets(id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (echange_id) REFERENCES echanges(id)
);
