<?php
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

session_start();

if(isset($_GET['remover'])){
    $rem = $_GET['remover'];
    unset($_SESSION['carrito'][$rem]);
    header("Location: carrito.php");
}

$total=0;

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
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                <?php foreach($_SESSION['carrito'] as $prod => $cantidad){
                    echo "<tr>";
                    $producto = $client->tienda->productos->findOne(['_id' => new MongoDB\BSON\ObjectID($prod)]);
                ?>
                        <td><?php echo $producto['name']; ?></td>
                        <td><?php echo $cantidad; ?></td> 
                        <td><?php echo $producto['price']; ?></td>
                        <td><?php echo $cantidad * $producto['price']; ?></td>
                        <td>
                            <a href="carrito.php?remover=<?php echo $prod;?>">
                                <svg class="bi bi-x-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                </svg>
                            </a>
                        </td>                     
                <?php
                    $total += $cantidad * $producto['price'];
                    echo "</tr>";
                    }
                ?>
                </table>
            </div>
            <form action="pagar.php" method="POST">
                <input type="hidden" name="total" value="<?php echo $total; ?>"/>
                <center>
                <h3>Total a pagar: <?php echo $total; ?></h3><br>
                <input type="submit" class="btn btn-danger" value="PAGAR"/>
                </center>
            </form>

        </main>

        <?php include_once("footer.php"); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </body>

</html>
