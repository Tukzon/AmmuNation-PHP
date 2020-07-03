<?php
session_start();
require '../../vendor/autoload.php';
$total = $_POST['total'];
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

if($total != 0){
    $ordenes = $client->tienda->ordenes;
    $ordenes->insertOne(array('total'=>$total, 'productos'=>$_SESSION['carrito']));
    unset($_SESSION['carrito']);
    echo json_encode(true);
}
    echo json_encode(false);
?>