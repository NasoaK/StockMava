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
        $categories->fetchAll();
        

        // Rajout du compte de categorie dans chaque tableau
        foreach ( $categories as $categorie){
            $id = $categorie[0];
            $count = $pdo->query("SELECT COUNT(categorie_id) FROM ArticlesMava WHERE categorie_id = $id LIMIT 1");
            $count->fetch();
            $categorie['count']= $count;
            //return array_unshift($categorie, $count, 3);
            //return array_push($categories,$categorie);
        };
        
        return $categories->fetchAll();
        $pdo = null;

    }
    public function postCategorie($nom){
        $pdo = $this->getPDO();
        $prep = $pdo->prepare("INSERT INTO CategoriesMava(id,nom) VALUES (?,?) ");
        $newId = 0;
        $prep->bindParam(1, $newId);
        $prep->bindParam(2, $nom);
        $pdo->beginTransaction();
        $prep->execute();
        $pdo->commit();
        $do = null ;

    }

    // Delete Categorie and Kill all Article join
    public function delCategorie($id){
        //$id = intval($id);
        $pdo = $this->getPDO();
       // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
        $sql1 = "DELETE FROM CategoriesMava WHERE id = $id";
    $sql2 = "DELETE FROM ArticlesMava WHERE categorie_id = $id";
        $prep = $pdo->prepare("DELETE FROM ArticlesMava WHERE categorie_id = $id");
        $prep2 = $pdo->prepare("DELETE FROM CategoriesMava WHERE id = $id");
        $pdo->beginTransaction();
        $prep->execute();
        $prep2->execute();
        $pdo->commit();
        $pdo = null ;
        header("Refresh:1") ;
        exit();
    }

    // SAve Articles Form deleted Categorie

    public function delCategSaveArt($id){
        $pdo = $this->getPDO();
        $prep = $pdo->prepare("
        DELETE FROM CategoriesMAva WHERE id = ? ; 
        UPDATE `ArticlesMava` SET `categorie_id`= 8 WHERE categorie_id = ? ");
        $prep->bindValue(1, $id);
        $prep->bindValue(2, $id);
        $prep->execute();
        $prep->commit();
        $pdo = null ;
        header("Refresh:1");
        exit();

    }



    //TODO Query Qui count le nombre d'articles present dans une categorie 
    
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