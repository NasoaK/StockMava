<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/article-detail.css?V=<?php echo time(); ?>">
</head>
<style>
    html{
        overflow:hidden;
    }
</style>

    <div class="container">
        <div class="img-container">
            <?= $article->get_image();?></p>
            <form action="" method="post" enctype="multipart/form-data" id="updatePhoto">
                <input type="file" name="image" required>
                <button name="updateImage">changer photo</button>
            </form>
        </div>

          <!-- UPDATE FORM -->

        <div class="text-container">
            

            <form action="" method="POST" >
            <p>Nom</p>
                <input size="39" type="text" name="nom" value="<?= $article->get_nom(); ?>"required> 
                <button name="updateNom" >changer nom</button>
                <span id="icon-photo"></span>
            </form>
            <br>
            
            <form action="" method="POST">
            <p>Prix d'achat</p>
                <input type="number" name="prixA" step="0.01"value="<?= $article->get_prix_achat(); ?>" required>
                <button name="updatePrixAchat"> Changer achat</button>
            </form>
            <br>

            
            <form action="" method="POST">
            <p>Prix de vente</p>
                <input type="number" name="prixV"  value="<?= $article->get_prix_vente(); ?>"required>
                <button t name="updatePrixVente">changer prix</button>
            </form>
            <br>
          
            <form action="" method="POST">
            <p>Quantité</p>
                <input type="number" name="quantity" value="<?= $article->get_quantity(); ?>"required>
                <button name="updateQuantity">changer quantité </button>
            </form>
            <!-- DELETE FORM -->

            <button id="delete-btn">Supprimer L'article</button>
            </div>
    </div>
    <br>
  

    <!-- Modal Form -->

<div id="modal-container">
 
    <div id="modal">

        <div id="warning-delete">

            <h2>Attention !</h2>
            <img src="dist/warning.png" alt="" srcset="" >
            <h4>Voulez vous supprimer cet article définitivement</h4>
            
            <div class="modal-box-btn">
            <button id="keep">garder l'article </button>
            <p>ou</p>
          
                <button id="delete-art">Supprimer l'article</button>
            </div>
        </div>

        <div id="success-delete">
            <h2>Success</h2>
            <img src="dist/delete.png" alt="">

            <h4> L'article a bien été supprimer</h4>
            <a href="?page=Articles">
            <form action="" method="POST" id="delete-form">
                 <button name="deleteArticle" class="close" style="background-color:#E29F72"> fermer</button>
             </a>
            </form>
        </div>
    </div>

</div>


    <script>

    const deleFakeBtn = document.querySelector('#delete-btn');
    const modal = document.getElementById('modal-container');
    const keep = document.getElementById('keep');
    const deleteArt = document.querySelector('#delete-art');
    const closeBtn = document.querySelector('.close');
    const warning = document.querySelector('#warning-delete');
    const success = document.querySelector('#success-delete');
console.log(deleteArt)


    console.log(deleFakeBtn);
    deleFakeBtn.addEventListener('click',()=>{
        modal.style.display ="flex";
    });

    keep.addEventListener('click',(event)=>{
        modal.style.display ="none";
        event.stopPropagation();
    });


    function deleteF(){

        allowSubmit = false;
  
            document.getElementById('delete-art').addEventListener('click', ()=>{
    
                warning.style.display = "none";
                success.style.display = "block";
            
        });
        
        closeBtn.addEventListener('click',()=>{
            modal.style.display ="none";
            warning.style.display = "flex";
            success.style.display = "none";
        }) 
    }
    

    /* closeBtn.addEventListener('click',()=>{
        modal.style.display ="none";
        warning.style.display = "flex";
        success.style.display = "none";

    }) */


    </script>
