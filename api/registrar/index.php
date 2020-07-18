<?php
session_start();
require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuario = $_POST['user'];
$contra = $_POST['pass'];
$contraValidador = $_POST['passver'];

$contraNoCoincide = "Las contrasenas no coinciden";
$usuarioRepetido = "Este usuario ya se encuentra registrado";
$accessGranted = "Usuario correctamente registrado";

if($contra != $contraValidador){
    echo json_encode($contraNoCoincide);
}else{

	$filtro = array('user'=>$usuario);
	$vendedor = $client->tienda->vendedores->findOne($filtro);

	if($vendedor != NULL){
		echo json_encode($usuarioRepetido);
	}else{

	$usuarios = $client->tienda->vendedores;
	$usuarios->insertOne(array('user'=>$usuario, 'password'=>$contra));
	echo json_encode($accessGranted);
	}
}

?>