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

    <title>Document</title>
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
                <li>
                    <a href="?page=Ventes" class=" nav-link <?php echo ($_GET['page'] == "Ventes" ? "nav-link-active" : "")?>" >Ventes du Jour</a>
                </li>
                <li>
                    <a href="?page=Articles" class=" nav-link <?php echo ($_GET['page'] == "Articles" ? "nav-link-active" : "")?>" >List stock</a>
                </li>
                <li>
                    <a href="?page=Ajouter" class="nav-link <?php echo ($_GET['page'] == "Ajouter" ? "nav-link-active" : "")?> ">Ajouter article</a>
                </li>
            </ul>
        </div>
    </nav>
    <script src="script/script.js"></script>
</body>
</html>

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

        require_once 'controller/ArticleController.php';
        $articleCtrl = new ArticleController();
        $articleCtrl->addArticle();

    }
    
    elseif($_GET['page'] =='Ventes'){

        require_once 'controller/VenteController.php';
        $venteCtrl = new VenteController();
        $venteCtrl->handleVentes();
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

    button = document.querySelector('#burger-btn');
    bars = document.querySelectorAll('#burger-btn span');
    menu = document.querySelector('#menu');
    console.log(bars[0]);  
    //bars[0]
    mobileMenu= false;

    function menuAnimation(){
        mobileMenu = !mobileMenu;

        if(mobileMenu){
            bars[0].style.top = '50%';
            bars[0].style.height = "5px";
            bars[0].style.transform = "translateY(-50%)rotateZ(-45deg)";
            bars[1].style.opacity = 0
            bars[2].style.transform = "translateY(-50%)rotateZ(45deg)"; 
            bars[2].style.top = "50%";
            bars[2].style.height = "5px";
            menu.style.height = "100vh";
            setTimeout(() => {
                menu.querySelector('ul').style.display = "flex";
                setTimeout(() => {
                    menu.querySelector('ul').style.opacity = "1";
                }, 200);
            }, 150);
        }
        else{
            bars[0].style.top = '0';
            bars[0].style.height = "5px";
            bars[0].style.transform = null;
            bars[1].style.opacity = 1
            bars[2].style.transform = null; 
            bars[2].style.top = null;
            bars[2].style.height = "5px";
            menu.style.height = "100%";
            menu.querySelector('ul').style.display = "none";
            menu.querySelector('ul').style.opacity = 0;
        }
    }

    button.addEventListener('click',menuAnimation);
    menu.querySelector('ul').addEventListener('click',menuAnimation);
    </script>