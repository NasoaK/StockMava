<?php

require_once 'Article.php';


class ArticleModel
{

    private function getPDO()
    {
        return new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');
       
    }
    //Get all article 

    public function getArticles(){
        //connect to db
        $pdo = $this->getPDO();

        // Query the db
        $articles = $pdo->query('SELECT * FROM ArticlesMava');
        
        //close connection / release memory
        $pdo = null;
        
        // Fetch and return
        return $articles->fetchAll(PDO::FETCH_CLASS, 'Article');
    }

    public function getArticleById($id){
        //Connect to db
        $pdo = $this->getPDO();

        // Query the article by id 

        $prep = $pdo->prepare('SELECT * FROM ArticlesMava WHERE id = ?');
        $prep->bindValue(1,$id, PDO::PARAM_INT);

        $result = $prep->execute();

        //close connection
        $pdo = null;
        if($result == 0){
            echo'west';
        }
        //Make sure I got the result
        if($result && $prep->rowCount() > 0){
            $prep->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $article = $prep->fetch();
            return $article;
        } else{
            echo 'prb';
        }
    }
    //* Add image function
    public function addimage($nom){

        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $dossier = 'Image/';

        do {
            
        } while (is_file($dossier.$nom.'.jpg') || is_file($dossier.$nom.'.gif')); 
            
        // On defini les types de fichiers autorisés, ici seuls les jpg et les png sont acceptés
        $AllowedExtensions = array('image/jpeg', 'image/png', 'image/gif') ;
        $Extension = strrchr($file_name,'.');
        $Extension = substr($Extension,1);
        $Extension = strtolower($Extension);
        
        if((count($AllowedExtensions) > 0 && in_array($file_type, $AllowedExtensions))){
            if(copy($temp_name,$dossier.$nom.'.'.$Extension)){
            $up = true;
            //'Le fichier est valide';
            $msg = 'Le fichier est valide';
            // On récupere le nom du fichier uploadé
                $nomdufichier = $nom.'.'.$Extension;
            }
        }else {
            $up = false;
            $msg = 'Erreur upload';
        }
        
        if ($up == true){
            // Chemin du fichier uploadé
            return $image = $dossier.$nomdufichier;
        }
    }

    //* Create function
    public function postArticle($nom,$prix_achat, $prix_vente,$quantity,$image){
        //Connect to database
            $pdo = $this->getPDO();
         //Insert script
            $newId = 0;
            $prep = $pdo->prepare("INSERT INTO ArticlesMava (id, nom, quantity, prix_achat, prix_vente, image) VALUES (?,?,?,?,?,?)");    
            $prep->bindParam(1,$newId);
            $prep->bindParam(2,$nom);
            $prep->bindParam(3,$quantity);
            $prep->bindParam(4,$prix_achat);
            $prep->bindParam(5,$prix_vente);
            $prep->bindParam(6,$image);
            
            $pdo->beginTransaction();
            $prep->execute();
            $pdo->commit();
            $pdo = null;
           
           // $prep->execute(array(0,$nom,$quantity,$prix,$image));
    
    }

    //*update functions
    public function updateImage($image,$id){
            //Connect to database
            $pdo = $this->getPDO();
            //Update
            $prep = $pdo->prepare("UPDATE ArticlesMava SET `image` = ?  WHERE `id`=?");    
            $prep->bindParam(1,$image);
            $prep->bindParam(2,$id);
            $pdo->beginTransaction();
            $prep->execute();
            $pdo->commit();
            $pdo = null;
    }

    public function updateNom($nom,$id){
         //Connect to database
         $pdo = $this->getPDO();
         //Update
         $prep = $pdo->prepare("UPDATE ArticlesMava SET `nom` = ?  WHERE `id`=?");    
         $prep->bindParam(1,$nom);
         $prep->bindParam(2,$id);
         $pdo->beginTransaction();
         $prep->execute();
         $pdo->commit();
         $pdo = null;
    }

    public function updatePrixVente($prixV,$id){
        //Connect to database
        $pdo = $this->getPDO();
        //Update
        $prep = $pdo->prepare("UPDATE ArticlesMava SET `prix_vente` = ?  WHERE `id`=?");    
        $prep->bindParam(1,$prixV);
        $prep->bindParam(2,$id);
        $pdo->beginTransaction();
        $prep->execute();
        $pdo->commit();
        $pdo = null;
   }

   public function updatePrixAchat($prixA,$id){
    //Connect to database
    $pdo = $this->getPDO();
    //Update
    $prep = $pdo->prepare("UPDATE ArticlesMava SET `prix_achat` = ?  WHERE `id`=?");    
    $prep->bindParam(1,$prixA);
    $prep->bindParam(2,$id);
    $pdo->beginTransaction();
    $prep->execute();
    $pdo->commit();
    $pdo = null;
}

   public function updateQuantity($quantity,$id){
    //Connect to database
    $pdo = $this->getPDO();
    //Update
    $prep = $pdo->prepare("UPDATE ArticlesMava SET `quantity` = ?  WHERE `id`=?");    
    $prep->bindParam(1,$quantity);
    $prep->bindParam(2,$id);
    $pdo->beginTransaction();
    $prep->execute();
    $pdo->commit();
    $pdo = null;
    }

    //*DELETE FUNCTION

    public function deleteimage($nom){
        $jpg = '.jpg';
        $png = '.png';
        $gif = '.gif';
        
    }

    public function deleteArticle($id){
        $pdo = $this->getPDO();
        $prep = $pdo->prepare("DELETE FROM `ArticlesMava` WHERE `id`=?");    
        $prep->bindParam(1,$id);
        $pdo->beginTransaction();
        $prep->execute();
        $pdo->commit();
        $pdo = null;
    }

}
?>