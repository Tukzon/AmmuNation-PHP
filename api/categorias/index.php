<?php
require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$collectioncat = $client->tienda->categorias->find();
$categorias = Array();
foreach ($collectioncat as $entry) {

    $categorias[ $entry['_id']->__toString() ] = $entry['name'];

}

echo json_encode($categorias);

?>