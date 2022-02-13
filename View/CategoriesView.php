<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/Categories.css">
</head>

<body>
    <!--  Lister categorie existante -->
    <h3>Toutes les categories</h3>

<section>

    <?php foreach ($categories as $categorie) : ?>
        <div class="card-categorie">
            <p>nom</p>
            <p><?= $categorie[1]; ?></p>

            <p>Nombre d'articles dans la categorie</p>
            <p><?= $categorie[2]; ?></p>

            <p><?= count($categorie)?></p>
        </div>
                
    <?php endforeach; ?>



</section>



    <select name="categorie" id="">
        <option value=""></option>

        <?php foreach ( $categories as $categorie) : ?>
            <option value="<?= $categorie[0];?>"><?= $categorie[1] ;?></option>
        <?php endforeach ; ?> 
    </select>





    <!-- Formulaire ajout categories -->
    <h3> Ajouter categorie</h3>

    <form action="" method="POST">
        <input type="text" name="nom" id="" placeholder="Nom de la categorie">
        <input type="submit" value="Ajouter Categorie" name="addCategorie">
    </form>


 <!-- Modal Form -->

 <div id="modal-container">
 
 <div id="modal">

     <div id="warning-delete">

         <h2>Attention !</h2>
         <p>Tout les articles dans cet categorie vont etre supprimer</p>
         <img src="dist/warning.png" alt="" srcset="" >
         <h4>Voulez vous supprimer cet article définitivement</h4>
         
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
         <a href="?page=Articles">
         <form action="" method="POST" id="delete-form">
              <button name="deleteArticle" class="close" style="background-color:#E29F72"> fermer</button>
          </a>
         </form>
     </div>
 </div>

</div>
</body>
</html>