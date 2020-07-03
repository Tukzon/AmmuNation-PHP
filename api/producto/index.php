<?php
require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

if(isset($_GET['prod'])){
    $pro = $_GET['prod'];
    $producto = $client->tienda->productos->findOne(['_id' => new MongoDB\BSON\ObjectID($pro)]);
    $nombre = $producto['name'];
    $descripcion = $producto['desc'];
    $precio = $producto['price'];
    $imagen = $producto['img'];

    $arr = ["nombre"=>$nombre, "id"=>$pro, "desc"=>$descripcion, "precio"=>$precio, "img"=>$imagen];
}

echo json_encode($arr);

?>
