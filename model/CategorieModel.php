<?php

require_once 'Categorie.php';

class CategorieModel
{
    private function getPDO()
    {
        return new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');
    }
    
    // TODO Function Create new Categories
    public function addCategorie($nom){
        // Connect to database
        $pdo = $this->getPDO();
        $pdo = null;
    }
    
    public function getCategories(){
        $pdo = $this->getPDO();
 
        $categories = $pdo->query("SELECT * FROM CategoriesMava" );
        return $categories->fetchAll();
        $pdo = null;
    }
    
}
?>