<?php
abstract class Db {
    // Informations de bdd
    private $host = "localhost";
    private $db_name = "Projet-mvc";
    private $username = "root";
    private $password = "";

    // Propriétes contenant la connexion
    protected $_connexion;
     // Propriétés contenant les informations de requetes
     public $table;
     public $id;
    //public $dsn = "mysql:host=". $this->DBHOST. '; dbname='. $this->DBNAME;

     public function getConnection() {
        $this -> _connexion = null;
        try {
            $this->_connexion = new PDO('mysql:host='. $this->host . ';
            dbname='. $this->db_name, $this->username, $this->password);
            // $this->_connexion = new PDO (this->dsn, $this->DBUSER, $this->DBPASS);
            $this->_connexion->exec('set names utf8');
        } catch(PDOException $e) {
            echo 'Erreur :'. $e->getMessage();
        }
     }

     public function getAll() {
        $sql="SELECT* FROM ". $this->table ."WHERE id=" . $this->id;
        $query = $this->_connexion->prepare($sql);
        // $requete = $this->_connexion->query($sql);
        $query->execute();
        // $tab = $requete->fetchAll();
        return $query->fetchAll();

        // return $tab;
     }
}
/*
define("DBHOST", "localhost");
define("DBNAME", "Projet-mvc");
define("DBUSER", "root");
define("DBPASS", "");

$dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;
try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOExeception $e) {
    die("Erreur:".$e->getMessage());
}
// Recupérer la liste des utilisateur
$sql = "SELECT * FROM `users`";

// exécuter directement la requete
$requet = $db->query($sql);

// Récupérer les données de la requetes
$user = $requet->fetch();

// Afficher les données récupérées
echo "<pre>";
var_dump($user);
echo "</pre>";

*/
