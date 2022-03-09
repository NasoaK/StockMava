<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?V=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="icon" href="favicon.ico"/>

<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="faicon_io/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    <title>Kossobe Stock</title>
</head>
<body>


    <nav>
    <div id="logo-box">
        <img id="logo" src="kossobe.png">
        <h1> Stock</h1>

    </div>
        <div id="menu">

            <div id="burger-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li>
                    <a href="index.php" class="nav-link <?php echo ($_GET['page']== "" ? "nav-link-active" : "")?>">Home</a>
                </li>
                <!-- OlD Vente du jour -->
               <!--  <li>
                    <a href="?page=Ventes" class=" nav-link <?php echo ($_GET['page'] == "Ventes" ? "nav-link-active" : "")?>" >Ventes du Jour</a>
                </li> -->
                <li>
                    <a href="?page=Articles" class=" nav-link <?php echo ($_GET['page'] == "Articles" ? "nav-link-active" : "")?>" >List stock</a>
                </li>
                <li>
                    <a href="?page=Ajouter" class="nav-link <?php echo ($_GET['page'] == "Ajouter" ? "nav-link-active" : "")?> ">Ajouter article</a>
                </li>

                <li>
                    <a href="?page=Categories" class="nav-link <?php echo ($_GET['page'] == "Categories" ? "nav-link-active" : "")?>">Modifier Categorie</a>
                </li>
            </ul>
        </div>
    </nav>
    
    
    <?php

//Check if there is a request
if(isset($_GET['page'])){
    //Only valid requests
    
    if($_GET['page']=='Articles'){
        //Aricle Controller
        require_once 'controller/ArticleController.php';
        $articleCtrl = new ArticleController();
        
        if(!isset($_GET['id']))
        $articleCtrl->handleArticles();
        else{
            $articleCtrl->handleArticle($_GET['id']);}
            
        } 
        //Route for adding article
        else if($_GET['page']=='Ajouter'){
            /* require_once 'controller/CategorieController.php';
            $categCtrl = new CategorieController();
            $categories = $categCtrl->getCategories();
            */
            require_once 'controller/ArticleController.php';
            $articleCtrl = new ArticleController();
            $articleCtrl->addArticle();
            
        }
        
        else if($_GET['page'] =='Ventes'){
            
            require_once 'controller/VenteController.php';
            $venteCtrl = new VenteController();
            $venteCtrl->handleVentes();
        }
        
        // Manage Categories
        else if($_GET['page']=='Categories'){
            require_once 'controller/CategorieController.php';
            $articleCtrl = new CategorieController();
            $articleCtrl->manageCategories();
        }
        // Error view
        else {
            $message = '404, this page doesnt exist';
            require_once 'View/errorView.php';
        }
    }
    
    else{
        require_once 'controller/ArticleController.php';
        $articleCtrl = new ArticleController();
        $articleCtrl->stockRecap();
    };
    
    ?>


<script>
    
// Start cookie

sessionStorage.setItem('chill',1);
let sessionBaseV= 1;
const links = document.querySelectorAll('a');

function setDefault(){    
  if(sessionStorage['chill'] === undefined) {
     sessionStorage['chill'] = sessionBaseV;
  }
}
setDefault();

function getChill() {
   return parseInt(sessionStorage["chill"]);
}

function incrementChill(){
    //Mock upf
    /*  if(currentValue > CONSTANT_VALUE){
        sessionStorage['chill'] = currentValue + 1;
    } */
    //Incr on click
    for(const l of links){
    let currentValue = getChill();
    l.addEventListener('click',()=>{
        sessionStorage['chill'] = currentValue +1 ;
    } );

    // Decr on btn click
    backbutton.addEventListener('click',()=>{
    console.log('session storage :');
    sessionStorage['chill'] = currentValue -- ;

});



}

}
console.log(getChill());



/* const backbutton = document.querySelector('#back-button');



if(getChill() = 1 ){
    backbutton.removeAttribute('disabled','');
}else{
    backbutton.setAttribute('disabled','');
} */

// End Cookies
   
    </script>
    <script src="script/script.js"></script>
    <script src="script/navbar.js"></script>
    </body>
    </html>