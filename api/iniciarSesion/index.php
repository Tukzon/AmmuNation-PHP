<?php
session_start();
require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuario = $_POST['user'];
$contra = $_POST['pass'];
$filtro = array('user'=>$usuario,'password'=>$contra);

$vendedor = $client->tienda->vendedores->findOne($filtro);
$fail = Array();
$pass = Array();
$fail[0] = "Las credenciales ingresadas no coinciden";
$fail[1] = "Iniciar sesión";
$pass[0] = "Sesion iniciada";
$pass[1] = $usuario;

if($vendedor == NULL){
    echo json_encode($fail);
}else{
    if(!isset($_SESSION['conexion'])){
        $_SESSION['conexion'] = $usuario;
    }
    echo json_encode($pass);
}
?>