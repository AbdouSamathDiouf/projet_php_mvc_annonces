<?php
abstract class Db {
    // Informations de bdd
    private $host = "localhost";
    private $db_name = "Projet_mvc";
    private $username = "root";
    private $password = "";

    // Propriétes contenant la connexion
    protected $_connexion;
     // Propriétés contenant les informations de requetes
     public $table;
     public $id;

     public function getConnection() {
        $this -> _connexion = null;

        try {
            $this->_connexion = new PDO('mysql:host='. $this->host . ';
            dbname='. $this->db_name, $this->username, $this->password);
            $this->_connexion->exec('set names utf8');
        } catch(PDOException $e) {
            echo 'Erreur :'. $e->getMessage();
        }
     }

     public function getAll() {
        $sql="SELECT* FROM ". $this->table ."WHERE id=" . $this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
     }
}