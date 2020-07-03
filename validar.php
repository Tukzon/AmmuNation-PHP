<?php
//PARA VERIFICAR CREDENCIALES DE INICIO DE SESIÓN
session_start();
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuario = $_POST['user'];
$contra = $_POST['pass'];

$filtro = array('user'=>$usuario,'password'=>$contra);

$vendedor = $client->tienda->vendedores->findOne($filtro);

if($vendedor == NULL){
    die("USUARIO O CONTRASEÑA INCORRECTA.");
}else{
    if(!isset($_SESSION['conexion'])){
        $_SESSION['conexion'] = $usuario;
    }
    header('Location: vendedor.php');
}
?>