<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/categories.css?V=<?php echo time(); ?>">
</head>

<body>
    <!--  Lister categorie existante -->
    
    <!-- !!! Select Foireach categorie -->

        <div class="ajout-container">
                <h3> Ajouter une categorie</h3>
                <form action="" method="POST">
                    <input type="text" name="nom" id="" placeholder="Nom de la categorie">
                    <input type="submit" value="Ajouter Categorie" name="addCategorie">
                </form>
            </div>

        <section>
            
            <h3>Toutes les categories</h3>
            <div class="categorie-container">

                <?php foreach ($categories as $categorie) : ?>

                    
                    <div class="card-halo" style="<?php echo ($categorie[2]["COUNT(categorie_id)"] < 1  ? "border-color:red" : "")?>">
                    
                        <div class="card">
                            <div class="text-box">
                                <p class="label">nom</p>
                                <p><?= $categorie[1]; ?></p>
                            </div>
                            
                            <div class="text-box">
                                <p class="label">Nombre d'articles</p>
                                <p> <span style="color:gray;<?php echo ($categorie[2]["COUNT(categorie_id)"] < 1 ? "color:red" : "")?>"><?= $categorie[2]["COUNT(categorie_id)"]; ?></span></p>
                                
                            </div>
                            
                            <form action="" class="pCategId">
                                <input type="number" class="id"name="value" value="<?= $categorie[0]; ?>" style="display:none">
                                <input type="submit" value="Supprimer" class="form-supprimer">
                            </form>
                            
                            <?php if($categorie[2]["COUNT(categorie_id)"] < 1) { ?>
                    <p class="caption"> Il n'ya aucun article lieé à cet categorie</p>
                    <?php }?>
                            <!-- To strict Way no error handling     
                            <form action="" method="POST">
                                <input type="number" name="idCateg" value="<?= $categorie[0];?>" style="display:none;">
                                <input type="submit" value="Supprimer" name="deleteCategorie">
                            </form> -->
                            <!-- <button class="delete-btn">Supprimer</button> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
                
            </section>




    <!-- Formulaire ajout categories -->
    


 <!-- Modal Form -->

 <div id="modal-container">
 
    <div id="modal">

        <div id="warning-delete">

            <h2>Attention !</h2>
            <p style="color:red; margin-top:-25px; margin-bottom:15px">En supprimant cet categorie tous les articles liées disparaitrons</p>
            <img src="dist/warning.png" alt="" srcset="" >
            <h4>Voulez vous supprimer cette categorie definitevement ?</h4>
            
            <div class="modal-box-btn">
            <button id="keep">garder la categorie </button>
            <p>ou</p>
        
                <button id="delete-art">Supprimer la categorie</button>
            </div>

        </div>

        <div id="success-delete">
            <h2>Success</h2>
            <img src="dist/delete.png" alt="">

            <h4> La categorie a bien été supprimer</h4>
            <form action="" method="POST" id="delete-form">
                <input type="number" name="idCateg" id="finalValueCateg" value="" style="display: none">
                <button name="deleteCategorie" id="close" style="background-color:#E29F72"> fermer</button>
            </form>
        </div>
 </div>

</div>
    <script src="script/categorieScript.js"></script>
</body>
</html>