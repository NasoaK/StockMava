<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
</head>

<body>
    <h2>Something bad happened.</h2>
    <p>Message : <?= $message; ?></p>



    
    <form action="" method="POST">
        <input type="submit" value="Retour" name="retour">
    </form>
    
    <?php

        if(isset($_POST['retour'])){

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    ?>
</body>

</html>