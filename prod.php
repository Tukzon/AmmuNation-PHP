<?php
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

if(isset($_GET['key'])){
    $pro = $_GET['key'];
    $producto = $client->tienda->productos->findOne(['_id' => new MongoDB\BSON\ObjectID($pro)]);
    $nombre = $producto['name'];
    $descripcion = $producto['desc'];
    $precio = $producto['price'];
    $imagen = $producto['img'];
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
            <div class="prod-info container">
                <div class="prod-name">
                <h1><?php echo $nombre;?></h1>
                </div>
                <img class="img-responsive" src="<?php echo $imagen?>">
                </div>
                <div class="prod-desc right-content">
                <p><?php echo $descripcion?></p>
                </div>
                <div class="prod-precio">
                <h2>Precio: </h2><h1 class="precioGTA">$<?php echo $precio; ?></h1>
                </div>            
            </div>
                <div class="ml-auto">
                    <form action="agregar.php" method="POST">
                        <input type="hidden" name="producto" value="<?php echo $pro; ?>"/>
                        Cantidad: <input type="number" name="cantidad" value="1"/>
                        <input type="submit" value="Añadir al carrito"/>
                    </form>
                </div>

        </main>
        
        <?php include_once("footer.php"); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </body>

</html>