<?php
//PARA GENERAR UN VENDEDOR EN LA COLLECTION 'VENDEDORES' Y VERIFICAR SI EXISTEN
session_start();
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuario = $_POST['user'];
$contra = $_POST['pass'];
$contraValidador = $_POST['passver'];

if($contra != $contraValidador){
    die("Las contraseñas no coinciden");
}

$filtro = array('user'=>$usuario);
$vendedor = $client->tienda->vendedores->findOne($filtro);

if($vendedor != NULL){
    die("YA EXISTE UN USUARIO CON ESTE NICK");
}

$usuarios = $client->tienda->vendedores;
$usuarios->insertOne(array('user'=>$usuario, 'password'=>$contra));

header('Location: login.php');

?>