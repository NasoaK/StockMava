<?php
require_once 'model/ArticleModel.php';


class ArticleController 
{
    private $_model;

    public function __construct()
    {
        $this->_model = new ArticleModel();
    }

    public function stockRecap(){
        $filtre = ' ORDER BY `nom` ASC ';
        $filtre = '';
        if(isset($_POST['tri-btn'])){
            $categ = trim($_POST['filtre-tri']);
            $direction = trim($_POST['direction-tri']);
            $filtre = "`$categ` $direction";
            $query= 'ORDER BY '.$filtre;
            $articles = $this->_model->getArticles($query);
        }else {
            $articles = $this->_model->getArticles($filtre);
        }



        //2 Check/ Do the Validations
        if(count($articles)==0){
                
            $message = "No Articles found.";
            require_once 'View/ErrorView.php';
        } else{
            
            //3. Pass the Article's list to the view
            require_once 'View/HomeView.php';
        }


    }

    public function handleArticles(){
        
        $categories = $this->_model->getCategories();
        // If a categorie is pick  WHERE `categorie` = "instruments" 

        if(isset($_POST['tri-categorie'])){
            $categ_id = trim($_POST['categorie']);
            if($categ_id){
                $categ = ' WHERE `categorie_id` = '.$categ_id;
                      $articles = $this->_model->getArticles($categ);
            }else{
                $categ = '';
                      $articles = $this->_model->getArticles($categ);

            }

            
        }
        elseif(isset($_POST['jouets'])){

            $categ = 'WHERE `categorie` = "jouet"';
                      $articles = $this->_model->getArticles($categ);

        }elseif(isset($_POST['noel'])){

            $categ = 'WHERE `categorie` = "noel"';
                      $articles = $this->_model->getArticles($categ);

        }elseif(isset($_POST['searchB'])){
            $categ = 'WHERE `name` LIKE "%a%"';
            $articles = $this->_model->getArticles($categ);

        }
        else{

            $categ = '';
            

            //1. Ask the model the article list
            $articles = $this->_model->getArticles($categ);
            
        }
            //2 Check/ Do the Validations
            if(count($articles)==0){

                
                $message = "Aucun article trouvés dans la categorie." ;
                require_once 'View/ErrorView.php';
            } else{
                //3. Pass the Article's list to the view
                require_once 'View/ArticleView.php';
            }


             // TODO Ajouter Vente du jour
    
            if(isset($_POST['newVente'])){
                $nom = trim($_POST['nom']);
                $prix = trim($_POST['prix']);
                $id = trim($_POST['id']);
                $this->_model->newVente($nom,$prix,$id);
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
            
            //TODO Update the article
            //update the article
            
            if(isset($_POST['updateImage'])){
                $nom = $article->get_nom();
                $this->_model->deleteImage($nom);
                $image = $this->_model->addImage($nom);
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
                require_once 'View/errorView.php'; 

            }

            // Pass the specifiq article to the view
            require_once 'View/ArticleDetailView.php';
        }
    }



    // TODO Manage Categories 
    // Manage Categories
    public function manageCategories(){
        require_once 'View/CategoriesView.php';

        if(isset($_POST['addCategorie'])){
            $nom = trim($_POST['nom']);
            
        }

    }

   
    // TODO POST ARTICLE
    public function addArticle(){
        $categories = $this->_model->getCategories();
        $count = count($categories);
            //3. Pass the Article's list to the view
            require_once 'View/AddArticleView.php';
    
            
            
            //Check if form is submited
            if(isset($_POST['submit'])){
                
                $nom = trim($_POST['nom']);
                $prix_achat = trim($_POST['prixAchat']);
                $prix_vente = trim($_POST['prixVente']);
                $quantity = trim($_POST['quantity']);
                $image = $this->_model->addImage($nom);
                $categorie_id = trim($_POST['categorie']);
                $this->_model->postArticle($nom,$prix_achat, $prix_vente,$quantity, $image, $categorie_id);
                
                // Test recherche dynamique Work 
                //SELECT * FROM `ArticlesMava` WHERE nom LIKE '%a%'
                
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