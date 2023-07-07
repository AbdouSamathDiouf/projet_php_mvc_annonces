<!-- annonces-modification.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Modification d'une annonce</title>
</head>
<body>
    <h1>Modification d'une annonce</h1>
    
    <form action="annonces-modification.php?id=<?php echo $annonce['id']; ?>" method="POST">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" value="<?php echo $annonce['titre']; ?>"><br>
        
        <label for="description">Description :</label>
        <textarea name="description"><?php echo $annonce['description']; ?></textarea><br>
        
        <label for="prix">Prix :</label>
        <input type="number" name="prix" value="<?php echo $annonce['prix']; ?>"><br>
        
        <input type="submit" value="Enregistrer">
    </form>
    
    <a href="annonces-list.php">Retour à la liste des annonces</a>
</body>
</html>
