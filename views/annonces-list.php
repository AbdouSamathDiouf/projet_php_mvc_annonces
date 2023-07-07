<!-- annonces-list.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Liste des annonces</title>
</head>
<body>
    <h1>Liste des annonces</h1>
    
    <ul>
        <?php foreach ($annonces as $annonce): ?>
            <li>
                <h2><?php echo $annonce['titre']; ?></h2>
                <p><?php echo $annonce['description']; ?></p>
                <p>Prix : <?php echo $annonce['prix']; ?> €</p>
                <a href="annonces-details.php?id=<?php echo $annonce['id']; ?>">Voir les détails</a>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <a href="annonces-ajout.php">Ajouter une annonce</a>
</body>
</html>
