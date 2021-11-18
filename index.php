<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<h1>Stock MavaUnivers</h1>

    <nav>
        
        <ul>
            <li>
                <a href="index.php" class="nav-link <?php echo ($_GET['page']== "" ? "nav-link-active" : "")?>">Home</a>
            </li>
            <li>
                <a href="?page=Articles" class=" nav-link <?php echo ($_GET['page'] == "Articles" ? "nav-link-active" : "")?>" >List stock</a>
            </li>
            <li>
                <a href="?page=Ajouter" class="nav-link <?php echo ($_GET['page'] == "Ajouter" ? "nav-link-active" : "")?>">Ajouter article</a>
            </li>
        </ul>
    </nav>

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
    
    // Error view
    else {
        $message = '404, this page doesnt exist';
        require_once 'View/errorView.php';
    }
}

else{
    require_once 'View/HomeView.php';
};

?>