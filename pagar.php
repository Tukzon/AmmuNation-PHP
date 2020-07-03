<?php
//PARA VALIDAR LAS COMPRAS Y AGREGAR A COLLECTION 'ORDENES'
require 'vendor/autoload.php';
session_start();
$total = $_POST['total'];
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

if($total != 0){
    $ordenes = $client->tienda->ordenes;
    $ordenes->insertOne(array('total'=>$total, 'productos'=>$_SESSION['carrito']));
    unset($_SESSION['carrito']);
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
            <?php if ($total != 0 ){ ?>
                <h2 class="info">Compra realizada con éxito!</h2>
            <?php }else{ ?>
                <h2 class="info">Ha ocurrido un error en su compra!</h2>
            <?php } ?>
        </main>

        <?php include_once("footer.php"); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>

</html>