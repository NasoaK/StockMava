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
        $categories = $this->_model->getCategories();
        //$categories = $this->_model->countCategorie($categoriesInc);
        
        
  
        require_once 'View/CategoriesView.php';
        
    }
    
}
