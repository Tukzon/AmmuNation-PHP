<?php
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

if(isset($_GET['key'])){
    $cat = $_GET['key'];
    $collectionprod = $client->tienda->productos->find(['categoria' => $cat]);
}else{  //PARA VERIFICAR LA DISTRIBUCIÓN DE TODOS LOS ELEMENTOS DE LA DB BORRAR ?key=XXXX  
    $collectionprod = $client->tienda->productos->find();
}
$productos = Array();
$imagenes = Array();
foreach($collectionprod as $entry){
    $productos[ $entry['_id']->__toString()] = $entry['name'];
    $imagenes[ $entry['_id']->__toString()] = $entry['img'];
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
        <div class="container">
            <h2>Productos:</h2>                               
            <div class="prods-deploy row">
                    <?php
                    foreach($productos as $key => $prod){
                    ?>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb item-mostrador"><img class="img-prod-cat img-fluid" src="<?php echo $imagenes[$key]; ?>">
                        <div class="nombre-deploy"><a href="prod.php?key=<?php echo $key;?>" ><h4><?php echo $prod ?></h4></a></div>
                        </div>
                        <?php
                    }
                    ?>
            </div>              
        </div>
    </main>    
    <?php include_once("footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>