<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
 

    <form action="" method="post" enctype="multipart/form-data">
        <select name="categorie" id="">
            <option value="Jouet">Jouet</option>
            <option value="instruments">instruments</option>
            <option value="Artisanat">Artisanat</option>
            <option value="Noel">Noel</option>
        </select>
        <input type="text" name="nom" placeholder="le nom de l'article" value="" required>
        <br>
        <input type="number" name="quantity" placeholder="la quantité" value="" required>
        <br>
        <input type="number" name="prixAchat" id="" placeholder="le prix d'achat" value="" required>
        <br>
        <input type="number" name="prixVente" id="" placeholder="le prix de vente" value="" required>
        <br>
        <input type="file" name="image" id="" value="" required>
         <br>
        <input type="submit" value="Ajouter Article" name="submit" placeholder="submit">
    </form>

</body>
</html>