<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2> Stock List</h2>

<form action="" method="post">
    <input type="submit" value="jouets" name="jouets">
</form>

<form action="" method="post">
    <input type="submit" value="Instruments" name ="instruments">
</form>

<form action="" method="post">
    <input type="submit" value="Artisanat" name="artisanat">
</form>

<form action="" method="post">
    <input type="submit" value="Noel" name="noel">
</form>




<?php foreach ($articles as $article) : ?>

    <section>
        <div class="container">
            <div class="detail">
                <p> <?= $article->get_image()?></p>
                <p>Name : <?= $article->get_nom();?></p>
                <p> Prix d'achat : <?= $article->get_prix_achat(); ?></p>
                <p> Prix de vente : <?= $article->get_prix_vente(); ?></p>
                <p> Quantité : <?= $article->get_quantity(); ?></p>
            </div>
            <button> <a href="?page=Articles&id=<?=$article->get_id();?>">Details</a></button>
        </div>
    <hr>
        <?php endforeach; ?>
    </section>
</body>
</html>