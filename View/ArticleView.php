<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/article-list.css">
</head>
<body>
    

<div id="categ-container">

    <form action="" method="post" >
        <input type="submit" value="jouets" name="jouets" class="categ-button <?php echo (isset($_POST['jouets']) ? "categ-button-active" : "")?>">
    </form>
    
    <form action="" method="post" >
        <input type="submit" value="Instruments" name ="instruments"  class="categ-button <?php echo (isset($_POST['instruments']) ? "categ-button-active" : "")?>">
</form>

<form action="" method="post" >
    <input type="submit" value="Artisanat" name="artisanat" class="categ-button <?php echo (isset($_POST['artisanat']) ? "categ-button-active" : "")?>">
</form>

<form action="" method="post" >
    <input type="submit" value="Noel" name="noel" class="categ-button <?php echo (isset($_POST['noel']) ? "categ-button-active" : "")?>">
</form>

</div>




<section>
    <div id="container">
            <?php foreach ($articles as $article) : ?>
<div class="card">
    <p class="img-pos">
    <?= $article->get_image();?>
    </p>
    <p>Name : <?= $article->get_nom();?></p>
    <p> Prix d'achat : <?= $article->get_prix_achat(); ?></p>
    <p> Prix de vente : <?= $article->get_prix_vente(); ?></p>
    <p> Quantité : <?= $article->get_quantity(); ?></p>
    <button> <a href="?page=Articles&id=<?=$article->get_id();?>">Details</a></button>
</div>
         
      
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>