<?php
namespace App\app;
class Auth
{
    public static function login($username, $password)
    {
        // Vérifier les informations d'identification de l'utilisateur dans la base de données
        // Effectuer les vérifications nécessaires et renvoyer true si l'authentification est réussie, sinon false
    }

    public static function logout()
    {
        // Déconnecter l'utilisateur en supprimant les informations de session ou en effectuant d'autres opérations nécessaires
    }

    public static function isLoggedIn()
    {
        // Vérifier si l'utilisateur est connecté en vérifiant les informations de session ou en effectuant d'autres vérifications nécessaires
        // Renvoyer true si l'utilisateur est connecté, sinon false
    }
}
