<?php

require_once 'Categorie.php';

class CategorieModel
{
    private function getPDO()
    {
        return new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');
    }


    public function getCategories(){
        
        $pdo = $this->getPDO();
        $categories = $pdo->query("SELECT * FROM CategoriesMava");
        $pdo = null;
        return $categories->fetchAll(PDO::FETCH_CLASS, 'Categorie');
    }
}

?>