<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories View</title>
</head>

<style>
/* TODO Modal */

#modal-container{
    background-color: #0000007e;
    backdrop-filter: blur(5px);
    z-index: 1000;
    position: absolute;
    width: 100vw;
    height: 100vh;
    top: 0;
    padding: 12vh 15vw;
    display: none;
}


#modal{
    width: 100%;
    height: 100%;
    border-radius: 12px;
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
    text-align: center;
}


#modal img{
    width:200px; height:150px; object-fit:contain
}
#modal h2{
    margin-bottom: 40px;
    font-size: 30px;
    color: #e27272;
}
#modal h4{
    margin-bottom: 40px;
    color: #E29F72;
}

.modal-box-btn{
    display: flex;
}
#success-delete{
    display: none;
}
#modal button{
    border-radius: 12px;
    color: white;
   width: 200px;
   height: 50px;
    font-size: 20px;
    margin: 0px 15px;
}

#modal #keep{background-color: #4ae93f;}

#delete-art{background-color:red;}
</style>
<body>
    <!--  Lister categorie existante -->
    <h3>Toutes les categories</h3>

    <div id="categ-container">

    <?php ?>

    </div>



    <!-- Formulaire ajout categories -->
    <h3> Ajouter categorie</h3>

    <form action="" method="POST">
        <input type="text" name="nom" id="" placeholder="Nom de la categorie">
        <input type="submit" value="Ajouter Categorie" name="addCategorie">
    </form>

    <!-- Supprimer Categories -->


    <form action="" method="POST">
        <h3> Supprimer Categorie</h3>
        <select name="" id="">
            <option value="Categorie1">Categorie1</option>
            <option value="Categorie2">Categorie2</option>
            <option value="Categorie3">Categorie3</option>
        </select>
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