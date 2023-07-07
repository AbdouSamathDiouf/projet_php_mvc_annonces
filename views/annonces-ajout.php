<!-- annonces-ajout.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une annonce</title>
</head>
<body>
    <h1>Ajouter une annonce</h1>
    
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" required><br>
        
        <label for="description">Description :</label><br>
        <textarea name="description" id="description" rows="4" cols="50" required></textarea><br>
        
        <label for="prix">Prix :</label>
        <input type="number" name="prix" id="prix" required><br>
        
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
