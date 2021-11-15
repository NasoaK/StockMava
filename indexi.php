<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test PDO</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" name ="submit" value="submit">
    </form>

    <?php
        function getPDO()
      {
          return new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');
         
      }

    
      //Insert script

      function insert(){
        $pdo = new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');

        //$prep = $pdo->prepare("SELECT `photo` FROM `Articles` WHERE `id`= 16");    
          
        $prep = $pdo->
        $prep->execute();

        header("Content-type: image/png");
        echo($prep);
        }
    
        //insert();

        // StackOverFlow solution

        //Work
        
       /*      $db = mysqli_connect("sql324.main-hosting.eu","u662427607_adminMava","PasswordMavaAdmin1","u662427607_Stock_mava"); //keep your db name

            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $query = "INSERT INTO `Articles`(`id`, `nom`, `quantity`, `prix`, `image`) VALUES ('','photo',12,10,'$image')"; 
            $qry = mysqli_query($db, $query);
            */
            //Test with PDO
            $a="fzer";
            $b=31;
            $z=0;
            $c=23;

            
            
            // $pdo = new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');
            
            //$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image = fopen($_FILES['image']['tmp_name'],'rb');
            $pdo = new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_POST['submit'])){
            $prep = $pdo->prepare("INSERT INTO `Articles`(`id`, `nom`, `quantity`, `prix`, `image`) VALUES (?,?,?,?,?)");
            $prep->bindParam(1,$z);
            $prep->bindParam(2,$a);
            $prep->bindParam(3,$b);
            $prep->bindParam(4,$c);
            $prep->bindParam(5,$image, PDO::PARAM_LOB);
            $pdo->beginTransaction();
            $prep->execute();
            $pdo->commit(); 
       /*  }catch(Exception $e){
            echo 'Echec :'.$e->getMessage();
        }
         */
            
    }
        ?> 



<?php
       //Display the image Work
      /*  $db = mysqli_connect("sql324.main-hosting.eu","u662427607_adminMava","PasswordMavaAdmin1","u662427607_Stock_mava");
        $sql = "SELECT * FROM Articles WHERE `id` = 74";
        $sth = $db->query($sql);
        $result=mysqli_fetch_array($sth);
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>'; */


        $pdo2 = new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava','u662427607_adminMava','PasswordMavaAdmin1');
        $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $prep2 = $pdo2->prepare("SELECT * FROM Articles WHERE `id`=75");
        $prep2->execute();

        $result = $prep2->fetch(PDO::FETCH_ASSOC);
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>'; 

    ?>
</body>
</html>