<?php
require_once 'model/CategorieModel.php';


class CategorieController 
{
    private $_model;

    public function __construct()
    {
        $this->_model = new CategorieModel();
    }
    // Get Categories

    public function getCategories(){
        $categories = $this->_model->getCategories(); 
    }


      // TODO Manage Categories 
    // Manage Categories
    public function manageCategories(){
        require_once 'View/CategoriesView.php';

        if(isset($_POST['addCategorie'])){
            $nom = trim($_POST['nom']);
            
        }

    }

}