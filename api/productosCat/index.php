<?php
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
foreach($collectionprod as $entry){
    $productos[ $entry['_id']->__toString()] = $entry['name'];
    $imagenes[ $entry['_id']->__toString()] = $entry['img'];
}

echo json_encode($productos);

?>