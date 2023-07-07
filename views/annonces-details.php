<!-- annonces-details.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Détails de l'annonce</title>
</head>
<body>
    <h1>Détails de l'annonce</h1>
    
    <h2><?php echo $annonce['titre']; ?></h2>
    <p><?php echo $annonce['description']; ?></p>
    <p>Prix : <?php echo $annonce['prix']; ?> €</p>
    
    <a href="annonces.php">Retour à la liste des annonces</a>
</body>
</html>
