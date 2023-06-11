<?php
abstract class Model {
    // Informations de bdd
    private $host = "localhost";
    private $db_name = "mvc";
    private $username = "root";
    private $password = "";

    // Propriétes contenant la connexion
    protected $_connexion;
     // Propriétés contenant les informations de requetes
     public $stable;
     public $id;

     public function getConnection() {
        $this -> _connexion = null;

        try {
            $this -> _connexion = new PDO('mysql:host='. $this->host . ';
            dbname='. $this->db_name, $this->username, $this->password);
            $this->_connexion->exec('set names utf8');
        } catch(PDOException $e) {
            echo 'Erreur :' . $e->getMessage();
        }
     }
}