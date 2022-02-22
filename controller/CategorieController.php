<?php
require_once 'model/CategorieModel.php';
//require_once 'model/ArticleModel.php';

class CategorieController 
{
    private $_model;

    public function __construct()
    {
       $this->_model = new CategorieModel();
        //$this->_model = new ArticleModel();
    }


    // Manage Categories
    public function manageCategories(){

        //getCategories();
        //$categories = $this->_model->countCategorie($categoriesInc);
        
        
        //Add Categorie
        if(isset($_POST['addCategorie'])){
            $nom = trim($_POST['nom']);
            $this->_model->postCategorie($nom);
        };
        
        // TODO Delete Categorie By ID
        if(isset($_POST['deleteCategorie'])){
            $id = trim($_POST['idCateg']);
            $this->_model->delCategorie($id);
        };
        
        $categories = $this->_model->getCategoriesC();
                

            //Pass the view
        require_once 'View/CategoriesView.php';
                
    }

}
