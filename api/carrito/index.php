<?php
session_start();
require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$data = Array();
$prodsList = Array();
$master = Array();
echo json_encode(true);
if(isset($_COOKIE["carrito"])){
	foreach($_SESSION['carrito'] as $prod => $cantidad){
		array_push($prodsList,$prod);
		$producto = $client->tienda->productos->findOne(['_id' => new MongoDB\BSON\ObjectID($prod)]);
	    $data[$prod]= ['nombre' => $producto['name'], 'cantidad' => $cantidad, 'precio' => $producto['price'], 'total' => $cantidad * $producto['price'])];                    
	}
}
//var_dump($prodsList);
//var_dump($data);
array_push($master,$prodsList);
array_push($master,$data);
echo json_encode($master);

?>