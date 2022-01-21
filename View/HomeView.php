<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css?V=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
</head>
<body>
 
    <div class="container">

        <h1> Catalogue</h1>
        <label for="tri-select">Trier par:</label>

        <form action="" method="post">
            <select name="filtre-tri" id="tri-select">
                <option value=""></option>
                <option value="nom">nom</option>
                <option value="quantity">quantité</option>
                <option value="categorie">categorie</option>
                <option value="prix_achat">Prix de vente</option>
                <option value="prix_vente">Prix d'achat</option>
            </select>
            <select name="direction-tri" id="">
                <option value="ASC">croissant</option>
                <option value="DESC">Decroissant</option>
            </select>
            <input type="submit" name="tri-btn" value="trier">
        </form>

            <table>
            <tr>
                <th>Nom de l'article</th>
                <th>Quantité</th>
                <th>Categorie</th>
                <th>Prix de ventes </th>
                <th>Prix d' achat</th>
            </tr>

            <?php foreach ($articles as $article) : ?>

            <tr>
                <td>
                  <p> <?= $article->get_nom(); ?></p>
                </td>
                <td>
                    <p style="text-align: center"><?= $article->get_quantity();?> </p>
                </td>
                <td>
                    <p style="text-align: center"><?= $article->get_categorie();?> </p>
                </td>
                <td>
                    <p style="text-align: center"><?= $article->get_prix_vente();?> </p>
                </td>
                <td>
                    <p style="text-align: center"><?= $article->get_prix_achat();?> </p>
                </td>

            </tr>
            <?php endforeach; ?>
            </table>
    
    </div>
 
    <?php
      $array = array(1,2,3,4,5,6);
      echo 'bonjour';
      echo json_encode($array);
    ?>
    
    <script>
       /*  var responce = JSON.parse(request.responseText); 
        console.log(responce); */


        $(document).ready( function() {
            $('#prev').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'HomeView.php',
                    data: 'id=testdata',
                    dataType: 'json',
                    cache: false,
                    success: function(result) {
                        $('#content1').html(result[0]);
                    },
                });
            });
        });
    </script>

        <div id="prev" style="width: 50px; height: 50px; background-color:red"></div>

        <div id="content1" style="width:100px; height:100px; background-color:100px"></div>
</body>
</html>



