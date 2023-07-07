<?php
namespace App\models;

use PDO;
class Annonce {
    private $id;
    private $titre;
    private $description;
    private $prix;
    private $date_cre;

    public function __construct($id, $titre, $description, $prix, $date_cra) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->prix = $prix;
        $this->date_cre = $date_cra;
    }

 

    // Méthode pour récupérer toutes les annonces
    public static function getAll() {
        // Connexion à la base de données (vous pouvez adapter les informations de connexion)
        $dbHost = 'localhost';
        $dbName = 'projet-mvc';
        $dbUser = 'root';
        $dbPass = '';
        
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        
        // Requête SQL pour récupérer toutes les annonces
        $sql = "SELECT * FROM annonces";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $annonces = array();
        
        // Parcourir les résultats et créer des instances de la classe Annonce
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $annonce = new Annonce(
                $row['id'],
                $row['titre'],
                $row['description'],
                $row['prix'],
                $row['date_cre']
            );
            
            $annonces[] = $annonce;
        }
        
        return $annonces;
    }


// Méthode pour sauvegarder une annonce
    public function save() {
        // Connexion à la base de données (vous pouvez adapter les informations de connexion)
        $dbHost = 'localhost';
        $dbName = 'projet-mvc';
        $dbUser = 'root';
        $dbPass = '';
        
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        
        // Requête SQL pour insérer ou mettre à jour une annonce
        if ($this->id) {
            // L'annonce a déjà un ID, donc c'est une mise à jour
            $sql = "UPDATE annonces SET titre = :titre, description = :description, prix = :prix WHERE id = :id";
        } else {
            // L'annonce n'a pas encore d'ID, donc c'est une nouvelle insertion
            $sql = "INSERT INTO annonces (titre, description, prix) VALUES (:titre, :description, :prix)";
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':titre', $this->titre);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':prix', $this->prix);
        $stmt->bindValue(':date_cre', $this->date_cre);
        
        if ($this->id) {
            // Si c'est une mise à jour, bind également l'ID de l'annonce
            $stmt->bindValue(':id', $this->id);
        }
        
        $stmt->execute();
        
        if (!$this->id) {
            // Si c'était une nouvelle insertion, définir l'ID de l'annonce avec l'ID généré par la base de données
            $this->id = $pdo->lastInsertId();
        }
        
        return $this->id;
    }


    public function getById($id) {
        // Connexion à la base de données (vous pouvez adapter les informations de connexion)
    $dbHost = 'localhost';
    $dbName = 'projet-mvc';
    $dbUser = 'root';
    $dbPass = '';

    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);

    // Requête SQL pour récupérer l'annonce par son identifiant
    $sql = "SELECT * FROM annonces WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Vérifier si l'annonce existe
    if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Créer une instance de la classe Annonce avec les données récupérées
    $annonce = new Annonce(
        $row['id'],
        $row['titre'],
        $row['description'],
        $row['prix'],
        $row['date_cre']
    );

    return $annonce;
    } else {
    return null; // Aucune annonce trouvée avec cet identifiant
    }
    }



    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getDate() {
        return $this->date_cre;
    }

    public function setById($id) {
        $this->id = $id;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setDate($date_cra) {
        $this->prix = $date_cra;
    }

    public function delete() {
        
    }
    
}
