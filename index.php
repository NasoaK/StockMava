<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<h1>Stock MavaUnivers</h1>

    <nav>
        
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="?page=Articles">List stock</a>
            </li>
            <li>
                <a href="?page=Ajouter">Ajouter article</a>
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