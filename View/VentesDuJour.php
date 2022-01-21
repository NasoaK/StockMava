<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ventes.css?V=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    <h1>Ventes</h1>

    <div class="container">

        <table>
            <tr>
                <th>nom de l'article</th>
                <th>prix de vente</th>
                
            </tr>
            <?php foreach ($ventes as $vente) : ?>
                
                
                <tr>
                    <td>
                        <p> <?= $vente->get_nom();?></p>
                    </td>
                    <td>
                        <p>  <?= $vente->get_prix(); ?></p> 
                    </td>
                </tr>
                
                <?php endforeach; ?>
            </table>
            
            <!-- <form action="" method="GET">
                <button type="submit" value="" name="downloadExcel"> telecharger en excel</button>
            </form> -->
            
            <button>
                <a href='controller/exportVente.php'>Télécharger Vente du jour</a>
            </button>
            <?
    //$today = date('G');  // 17:00
    echo '<p>' .$today = date("h:i:sa") .'</p>';
    
    ?>

</div>



</body>
</html>