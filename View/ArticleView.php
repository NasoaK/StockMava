<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/article-list.css?V=<?php echo time(); ?>">
</head>
<body>
    

<div id="categ-container">

<form action="" method="post">
    <input type="submit" value="tout" name="all" class="categ-button <?php echo (empty($categ) ? "categ-button-active" : "")?>" >
</form>

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


<div id="export-stock-container">
    <button>
         <a href='controller/exportJouet.php'>Stock jouets excel</a>
    </button>
    <button>
         <a href='controller/exportNoel.php'>Stock Noel excel</a>
    </button>
    <button>
         <a>Stock Artisanat excel</a>
    </button>
    <button>
         <a>Stock instruments excel</a>
    </button>

</div>
    <div id="container">
            <?php foreach ($articles as $article) : ?>
                
                <div class="card-halo">                    
                    <div class="card">
                        <?= $article->get_image();?>
                        
                        
                        <div class="detail-card">
                            <p style ="font-size:17px;color:#a57f60"><?= $article->get_nom();?></p>
                            <p> <span class="name-detail">Prix d'achat : </span> <?= $article->get_prix_achat(); ?>  €</p>
                            <p> <span class="name-detail">Prix de vente : </span> <?= $article->get_prix_vente(); ?>  €</p>
                            <p> <span class="name-detail">Quantité :  </span><?= $article->get_quantity(); ?></p>
                            <a href="?page=Articles&id=<?=$article->get_id();?>" class="btn" >Details</a>
                            <form action="" method="POST">
                                <input type="text" name="nom" id="" value="<?=$article->get_nom();?>" style="display:none">
                                <input type="number" name="prix" id="" value="<?=$article->get_prix_vente();?>" style="display:none">
                                <input type="number" name="id" id="" value="<?=$article->get_id();?>" style="display:none">
                                <input type="submit" value="Ajouter aux Vente" name="newVente" class="btn btn-vente">
                            </form>
                        </div>
                    </div>
</div>
         
      
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>