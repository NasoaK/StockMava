<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
try {
   // $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
   $connection = new PDO('mysql:host=sql324.main-hosting.eu;dbname=u662427607_Stock_mava;','u662427607_adminMava','PasswordMavaAdmin1');
    //'mysql:host=https://auth-db324.hostinger.com/index.php?db=u662427607_Stock_mava;dbname=Articles;charset=utf8','u662427607_adminMava','PasswordMavaAdmin1'
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
  echo $e->getMessage();                         
}

?>
<?php

$host = 'sql324.main-hosting.eu';
$dbname = 'u662427607_Stock_mava';
$username = 'u662427607_adminMava';
$password = 'PasswordMavaAdmin1';
 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
</body>
</html>