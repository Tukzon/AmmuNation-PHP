<?php
require 'vendor/autoload.php';

session_start();

if(!isset($_SESSION['conexion'])){
    header('Location: login.php');
}

$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$ordenes = $client->tienda->ordenes->find();

$orders = Array();
$totales = Array();

foreach ($ordenes as $orden){
    $orders[ $orden['_id'] ->__toString()] = $orden['productos'];
    array_push($totales,$orden['total']);
}

$keys = array_keys($orders);

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
                <div class="row">
                    <h2>Ordenes de compra</h2>
                    <table class='table table-striped'>
                        <thead>
                            <th>ID de compra</th>
                            <th>Productos</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </thead>
                        <?php for($i=0; $i < count($orders); $i++) {            
                                echo "<tr>";
                                    echo "<td>$keys[$i]</td>";
                                    ?>
                                    <td>
                                    <?php
                                    foreach($orders[$keys[$i]] as $producto=>$cantidad){
                                        $productoDB = $client->tienda->productos->findOne(['_id' => new MongoDB\BSON\ObjectID($producto)]); ?>
                                        <?php echo $productoDB['name'];?> <br>
                                        <?php unset($productoDB);
                                    } ?>
                                    </td>
                                    <td>
                                    <?php
                                    foreach($orders[$keys[$i]] as $producto=>$cantidad){ 
                                        echo "$cantidad<br>";
                                    } ?>
                                    </td>
                                    <?php
                                    echo "<td>$totales[$i]</td>";
                                echo "</tr>";
                            
                        }
                        ?>                            
                    </table>
                </div>
            </div>

        </main>
        
        <?php include_once("footer.php"); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </body>

</html>