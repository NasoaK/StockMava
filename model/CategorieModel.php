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

        $items = array();
        // Rajout du compte de categorie dans chaque tableau
        foreach ( $categories as $categorie){
            $id = $categorie[0];
            $pdo = $this->getPDO();
            $count = $pdo->query("SELECT COUNT(categorie_id) FROM ArticlesMava WHERE categorie_id = ? LIMIT 1");
            $count->execute([$id]); 
            $row = $stmt->fetch();
            $pdo = null;
            array_push($categorie,$row);
            $items[] = $categorie;
            //return array_unshift($categorie, $count, 3);
            //return array_push($categories,$categorie);
        }
        $items;
        dump($items);

    }

    //Query Qui count le nombre d'articles present dans une categorie 
    
    // SELECT COUNT(categorie_id) FROM ArticlesMava WHERE categorie_id = 1; 

    /* public function countCategorie($categories){
       
        foreach ( $categories as $categorie){
            $id = $categorie[0];
            $pdo = $this->getPDO();
            $count = $pdo->query("SELECT COUNT(categorie_id) FROM ArticlesMava WHERE categorie_id = $id");
            $pdo = null;
            $count;
            return array_push($categorie, $count); 
            //return array_unshift($categorie, $count, 3);
        }
        return $categories;
    } */
    //Query qui rassemble liste les categories de chaque articles
    //SELECT CategoriesMava.nom, ArticlesMava.categorie_id FROM `CategoriesMava`, ArticlesMava WHERE CategoriesMava.id = ArticlesMava.categorie_id


    
}
?>