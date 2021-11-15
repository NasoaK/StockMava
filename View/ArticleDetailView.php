<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h2>Article</h2>
    <p><?= $article->get_image();?></p>
    <p>Name : <?= $article->get_nom(); ?></p>
    <p>Prix achat : <?= $article->get_prix_achat(); ?></p>
    <p>Prix vente : <?= $article->get_prix_vente(); ?></p>
    <p>Quantité : <?= $article->get_quantity(); ?></p>
    <br>
    <!-- UPDATE FORM -->
    <p>Modifier photo</p>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <input type="submit" name="updateImage" value="changer photo" required>
    </form>
    <br>
    <p>Modifier nom</p>
    <form action="" method="POST">
        <input type="text" name="nom">
        <input type="submit" name="updateNom" value="changer nom" required>
    </form>
    <br>
    <p>Modifier prix d'achat</p>
    <form action="" method="POST">
        <input type="number" name="prixA">
        <input type="submit" name="updatePrixAchat" value="changer prix" required>
    </form>
    <br>

    <p>Modifier prix de vente</p>
    <form action="" method="POST">
        <input type="number" name="prixV">
        <input type="submit" name="updatePrixVente" value="changer prix" required>
    </form>
    <br>
    <p>Modifier quantité</p>
    <form action="" method="POST">
        <input type="number" name="quantity">
        <input type="submit" name="updateQuantity" value="changer quantité" required>
    </form>
    <!-- DELETE FORM -->
    <p>Supprimer l'article</p>
    <form action="" method="POST">
        <input type="submit" name="deleteArticle" value="supprimer l'article">
    </form>

</body>

</html>