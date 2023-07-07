-- Table des utilisateurs
CREATE TABLE utilisateurs (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  mot_de_passe VARCHAR(255) NOT NULL
);

-- Table des annonces
CREATE TABLE annonces (
  id INT PRIMARY KEY AUTO_INCREMENT,
  utilisateur_id INT NOT NULL,
  titre VARCHAR(255) NOT NULL,
  description TEXT,
  prix DECIMAL(10, 2),
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
);

-- Table des catégories
CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL
);

-- Table de liaison entre annonces et catégories (relation many-to-many)
CREATE TABLE annonces_categories (
  annonce_id INT NOT NULL,
  categorie_id INT NOT NULL,
  PRIMARY KEY (annonce_id, categorie_id),
  FOREIGN KEY (annonce_id) REFERENCES annonces(id),
  FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

-- Insérer des données dans la table "annonces"
INSERT INTO annonces (titre, description, prix) VALUES
('Annonce 1', 'Description de l''annonce 1', 100),
('Annonce 2', 'Description de l''annonce 2', 200),
('Annonce 3', 'Description de l''annonce 3', 150);

-- Insérer des données dans la table "utilisateurs"
INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES
('John Doe', 'john@example.com', 'motdepasse123'),
('Jane Smith', 'jane@example.com', 'pass123'),
('Bob Johnson', 'bob@example.com', 'password');

-- Autres insertions de données selon vos besoins...
