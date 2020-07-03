<?php
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$collectioncat = $client->tienda->categorias->find();
$categorias = Array();
foreach ($collectioncat as $entry) {

    $categorias[ $entry['_id']->__toString() ] = $entry['name'];

}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Ammu-Nation</title>
        <link rel='icon' href='assets/img/page/favicon.ico' type='image/x-icon' sizes="16x16" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    </head>

    <body class="colorfondo">
        
        <?php include_once("header.php"); ?>

        <main>

            <div class="cat-display container">
                <h1>Categorías</h1>
                <div class="cat-menu container-fluid">
                    <ul>
                        <?php 
                        foreach($categorias as $key => $cat){ ?>
                            <li><h2><a href="cat.php?key=<?php echo $key?>"><?php echo $cat ?></a><h2></li>

                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
        </main>
        
        <?php include_once("footer.php"); ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </body>

</html>