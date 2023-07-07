<?php
namespace App\controllers;

use App\models\Utilisateur;

require_once 'models/Utilisateur.php';

class AuthController {
    
    // Méthode pour gérer l'inscription d'un utilisateur
    public function register() {
        // Vérifier si le formulaire d'inscription a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $motDePasse = $_POST['mot_de_passe'];
            
            // Créer un nouvel utilisateur avec les données fournies
            $utilisateur = new Utilisateur($id, $nom, $email, $motDePasse);
            $utilisateur->setID($id);
            $utilisateur->setNom($nom);
            $utilisateur->setEmail($email);
            $utilisateur->setMotDePasse($motDePasse);
            
            // Enregistrer l'utilisateur dans la base de données
            $utilisateur->save();
            
            // Rediriger vers la page de connexion
            header('Location: login.php');
            exit;
        }
        
        // Afficher le formulaire d'inscription
        include 'views/register.php';
    }
    
    // Méthode pour gérer la connexion d'un utilisateur
    public function login() {
        // Vérifier si le formulaire de connexion a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $motDePasse = $_POST['mot_de_passe'];
            
            // Vérifier les informations de connexion dans la base de données
            $utilisateur = Utilisateur::getByEmail($email);
            
            if ($utilisateur && password_verify($motDePasse, $utilisateur->getMotDePasse())) {
                // Authentification réussie, enregistrer l'utilisateur dans la session
                $_SESSION['utilisateur'] = $utilisateur;
                
                // Rediriger vers la page d'accueil
                header('Location: index.php');
                exit;
            } else {
                // Informations de connexion incorrectes, afficher un message d'erreur
                $erreur = 'Identifiants incorrects. Veuillez réessayer.';
            }
        }
        
        // Afficher le formulaire de connexion
        include 'views/login.php';
    }
    
    // Méthode pour gérer la déconnexion de l'utilisateur
    public function logout() {
        // Supprimer l'utilisateur de la session
        unset($_SESSION['utilisateur']);
        
        // Rediriger vers la page de connexion
        header('Location: login.php');
        exit;
    }
    
}
