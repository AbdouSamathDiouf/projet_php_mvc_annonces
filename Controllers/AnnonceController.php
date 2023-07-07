<?php
namespace App\controllers;
use App\models\Annonce;

//require_once 'models/Annonce.php';

class AnnonceController {
    public function index() {
        // Logique pour afficher toutes les annonces
        $annonces = Annonce::getAll();
        // Affichage de la vue des annonces
        include 'views/annonces.php';
    }

    public function create() {
        // Logique pour créer une nouvelle annonce
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $date_cre = $_POST['date_cre'];
            // Création d'une nouvelle annonce
            $annonce = new Annonce($id, $titre, $description, $prix, $date_cre);
            $annonce->save();
            // Redirection vers la liste des annonces
            header('Location: index.php');
        } else {
            // Affichage du formulaire de création d'annonce
            include 'views/annonces-ajout.php';
        }
    }

    public function show($id) {
        // Logique pour afficher une annonce spécifique
        $annonce = Annonce::getById($id);
        // Affichage de la vue de l'annonce
        include 'views/annonces-details.php';
    }

    public function edit($id) {
        // Logique pour éditer une annonce
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $date_cre = $_POST['date_cre'];

            // Mise à jour de l'annonce
            $annonce = Annonce::getById($id);
            $annonce->setTitre($titre);
            $annonce->setDescription($description);
            $annonce->setPrix($prix);
            $annonce->setDate($date_cre);
            $annonce->save();

            // Redirection vers la liste des annonces
            header('Location: index.php');
        } else {
            // Affichage du formulaire d'édition d'annonce
            $annonce = Annonce::getById($id);
            include 'views/annonces-list.php';
        }
    }

    public function delete($id) {
        // Logique pour supprimer une annonce
        $annonce = Annonce::getById($id);
        $annonce->delete();
        // Redirection vers la liste des annonces
        header('Location: index.php');
    }
}
