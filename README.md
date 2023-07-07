# Projet de MVC
Ceci est une application web de petites annonces basée sur le modèle mvc en php.

# Structure du dossier
On a crée un dossier appélé "annonce-app". A l'intérieur de ce dossier, nous avons crée les sous-dossiers suivants : app, controllers, models, public, views.

# Dossier app
Dans le dossier app, nous avons creé les fichiers suivants : le fichier Auth.php pour l'authentification, le fichier Autoload.php pour charger automatiquement les classes, le fichier config.php pour définir les constantes et les varibales d'envioronnement, le fichier Database.php pour la connexion à la base de données, le fichier db.sql pour le script sql(les tables et l'insertion des données), le fichier Router.php pour le routage.

# Dossier controllers
Dans le dossier controllers, nous avons crée deux controleurs: Un controleurs pour les annonces et un autre pour l'authentification. Dans chaque controleur, nous avons défini des méthodes pour gérer les actions liées aux annonces.

# Dossier models 
Dans le dossier models, nous avons crée des classes representant nos modèles de données. Annonce.php pour le modèle des annonces et Utilisateur.php pour le modèle des utilisateurs.

# Dossier views 
Dans le dossier views, nous avons crée les fichiers qui permettent de gérer l'interface. Ainsi, le fichier annonces-ajout.php pour ajouter une annonce, le fichier annonces-details pour afficher les details d'une annonce, le fichier aanonces-list.php pour afficher la liste des annonces, le fichier annonces-modification pour modifier une annonce.

# Dossier public
Dans le dossier public, nous avons trois fichiers, le fichier index.php le point d'entrée de notre apply, le fichier script.js pour tout ce qui est JS et le fichier style.css pour la feuille des styles.

# Composer
Composer est l'outil qui va nous permettre, dans notre projet, de gérer l'auto-chargement des classes (autoloading) ainsi que les dépendances de notre projet.

# Initialisation du projet 

Nous lançons la commande `composer init` pour initialiser le projet en renseignant le nom et la description.
Composer va automatiquement créer un fichier .gitignore dans lequel il ajoutera le dossier vendor. En effet, ce dossier est créé automatiquement par Composer et contient les fichiers d'auto-chargement de classes ainsi que les dépendances. Nous n'avons donc pas besoin de le pousser vers le dépôt distant. N'importe quel développeur souhaitant récupérer ce projet peut clôner ce dépôt et effectuer un composer install, le dossier vendor sera recréé automatiquement.

# Déclaration de l'autoloading PSR-4

Afin d'organiser la structure de notre projet, nous allons déclarer, dans notre fichier composer.json, la méthode d'auto-chargement de nos classes que nous souhaitons qu'il applique.

L'AUTOCHARGEMENT
L'auto-chargement (ou autoloading), en PHP, intervient quand on souhaite utiliser une classe. PHP va chercher de quel(s) moyen(s) il dispose pour trouver le fichier de définition de cette classe. PSR-4 est une recommandation définissant une manière particulière d'aller chercher une classe.

Pour finir, nous allons générer une première version du dossier vendor en demandant à Composer de générer les fichiers d'autoloading : `composer dump-autoload`

# Routage :

J'ai rencontré un problème au niveau de mon routeur que je n'arrive pas à regler. 
