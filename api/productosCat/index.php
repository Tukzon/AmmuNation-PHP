<?php
session_start();
require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
if(isset($_GET['cat'])){
    $cat = $_GET['cat'];
    $collectionprod = $client->tienda->productos->find(['categoria' => $cat]);
}else{  //PARA VERIFICAR LA DISTRIBUCIÓN DE TODOS LOS ELEMENTOS DE LA DB BORRAR ?key=XXXX  
    $collectionprod = $client->tienda->productos->find();
}
$productos = Array();
$imagenes = Array();
$master = [];
foreach($collectionprod as $entry){
    $productos[ $entry['_id']->__toString()] = $entry['name'];
    $imagenes[ $entry['_id']->__toString()] = $entry['img'];
}
array_push($master,$productos);
array_push($master,$imagenes);
echo json_encode($master);

?>