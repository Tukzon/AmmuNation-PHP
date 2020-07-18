<?php

require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$collectioncat = $client->tienda->categorias->find();
$categorias = Array();
foreach ($collectioncat as $entry) {

    $categorias[ $entry['_id']->__toString() ] = $entry['name'];

}
header("Access-Control-Allow-Origin: *");
echo json_encode($categorias);

?>