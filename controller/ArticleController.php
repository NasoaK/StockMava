<?php
require_once 'model/ArticleModel.php';


class ArticleController 
{
    private $_model;

    public function __construct()
    {
        $this->_model = new ArticleModel();
    }

    public function handleArticles(){
        
        //1. Ask the model the article list
        
        $articles = $this->_model->getArticles();

        //2 Check/ Do the Validations
        if(count($articles)==0){
    
            $message = "No Articles found.";
            require_once 'View/ErrorView.php';
        } else{

        //3. Pass the Article's list to the view
        require_once 'View/ArticleView.php';
    }
    }

    public function handleArticle($id){

        // Ask the model the specific article 
        $article = $this->_model->getArticleById($id);

        //Check/ Do the validations
        if(!$article){
            $message = 'No Article found with id :' .$id;
            require_once 'View/errorView.php';
        } else{
            // Pass the specifiq article to the view
            require_once 'View/ArticleDetailView.php';

            //TODO Update the article
            //update the article
            
            if(isset($_POST['updateImage'])){
                $image = fopen($_FILES['image']['tmp_name'],'rb');
                $this->_model->updateImage($image, $id);
            }
            if(isset($_POST['updateNom'])){
                $nom = trim($_POST['nom']);
                $this->_model->updateNom($nom, $id);
            }
            if(isset($_POST['updatePrixAchat'])){
                $prixA = trim($_POST['prixA']);
                $this->_model->updatePrixAchat($prixA, $id);
            }
            if(isset($_POST['updatePrixVente'])){
                $prixV = trim($_POST['prixV']);
                $this->_model->updatePrixVente($prixV, $id);
            }
            if(isset($_POST['updateQuantity'])){
                $quantity = trim($_POST['quantity']);
                $this->_model->updateQuantity($quantity, $id);
            }

            //DELETE 
            if(isset($_POST['deleteArticle'])){
                $nom = $article->get_nom();
                $this->_model->deleteImage($nom);
                $this->_model->deleteArticle($id);
            }
        }
    }

    // TODO POST ARTICLE
    public function addArticle(){

        require_once 'View/AddArticleView.php';
        

        //Check if form is submited
        if(isset($_POST['submit'])){

            // !! TODO Image upload in dir
            // On donne une valeur aleatoire au fichier qu'on va uploader et on teste si ce nom existe deja
            $nom = trim($_POST['nom']);
            $prix_achat = trim($_POST['prixAchat']);
            $prix_vente = trim($_POST['prixVente']);
            $quantity = trim($_POST['quantity']);
            $image = $this->_model->addImage($nom);
            
            //Insert the values in the database
            $this->_model->postArticle($nom,$prix_achat, $prix_vente,$quantity, $image);

            //!!! END Image upload

                // Error handler
                /*  
                    $errors = array();
                    if(empty($name)){ array_push($errors, "Il manque le nom de l'article");}
                    if(empty($prix)){ array_push($errors, "Il manque un prix à l'article");}
                    if(empty($quantity)){ array_push($errors, "Il manque la quantité de l'article");}

                    var_dump($errors);

                    if(count($errors)==0){
                    
                }  */


       
            
        }
    
    }
    
    

}

?>