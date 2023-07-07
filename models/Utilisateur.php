<?php
namespace App\models;

use App\app\Database;
use PDO;

class Utilisateur {
    private $id;
    private $nom;
    private $email;
    private $motDePasse;

    public function __construct($id, $nom, $email, $motDePasse) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMotDePasse() {
        return $this->motDePasse;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }
    public function save()
    {
        $db = new Database(); // Instanciation de la classe Database pour gérer la connexion à la base de données
        
        // Récupération des données de l'utilisateur
        $id = $this->id;
        $nom = $this->nom;
        $email = $this->email;
        $motDePasse = $this->motDePasse;
        
        // Requête SQL pour insérer ou mettre à jour l'utilisateur dans la base de données
        $sql = "INSERT INTO utilisateurs (id, nom, email, mot_de_passe) VALUES (?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE id = VALUES(id), nom = VALUES(nom), mot_de_passe = VALUES(mot_de_passe)";
        
        // Exécution de la requête préparée avec les valeurs des paramètres
        $db->query($sql, [$id, $nom, $email, $motDePasse]);
    }

    public static function getByEmail($email)
    {
        $db = new Database();
        $query = "SELECT * FROM utilisateurs WHERE email = :email";
        $params = array(':email' => $email);
        $result = $db->query($query, $params);
        
        if ($result) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
