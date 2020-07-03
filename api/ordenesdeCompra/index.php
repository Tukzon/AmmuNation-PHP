<?php
require '../../vendor/autoload.php';

session_start();

if(!isset($_SESSION['conexion'])){
    echo json_encode(false);
} // else{
    $uri="mongodb://localhost";
    $client=new MongoDB\Client($uri);
    $ordenes = $client->tienda->ordenes->find();

    $orders = Array();

    foreach ($ordenes as $orden){
        $orders[ $orden['_id'] ->__toString()] = $orden['total'];
    }

    echo json_encode($orders);
 //}
?>                   
