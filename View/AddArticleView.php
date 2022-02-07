<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/addArticles.css?V=<?php echo time(); ?>">
</head>


<body>
 
<div class="container">


    <form action="" method="post" enctype="multipart/form-data">

    <h3>Ajoute un Article</h3>
    <p>*Tu pourra le modifier plus tard</p>
        <label for="categ">Categorie</label>
        <select name="categorie" id="categ">
            <option value="Jouet">Jouet</option>
            <option value="instruments">instruments</option>
            <option value="Artisanat">Artisanat</option>
            <option value="Noel">Noel</option>
        </select>
        <label for="nom">Nom</label>
        <input id="nom" type="text" name="nom" placeholder="le nom de l'article" value="" required>
        <label for="quantity">Quantity</label>
        <input id ="quantity" type="number" name="quantity" placeholder="la quantité" value="" required>
        <label for="prixA">Prix d'achat</label>
        <input id ="prixA"type="number" name="prixAchat" id="" placeholder="le prix d'achat" value="" step ="0.1" required>
        <label for="prixV">Prix de vente</label>
        <input id="prixV" type="number" name="prixVente" id="" placeholder="le prix de vente" value="" step ="0.1" required>
        <label for="image">Image</label>
        <input id="image" type="file" name="image" id="" value="" required>
        <input id="submit" type="submit" value="Ajouter Article" name="submit" placeholder="submit">
    </form>
</div>
<script>
    document.querySelector('#submit').addEventListener('click',()=>{
        alert('click');
    })
</script>
</body>
</html>

