<?php
//PARA AGREGAR UN PRODUCTO AL CARRITO
session_start();

if($_POST['cantidad'] <= 0){
    die("Ha ocurrido un error al procesar la transacción, intente de nuevo.");
}

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = Array();
}

if(isset($_SESSION['carrito'][$_POST['producto']])){
    $_SESSION['carrito'][$_POST['producto']] += $_POST['cantidad'];
}else{
    $_SESSION['carrito'][$_POST['producto']] = $_POST['cantidad'];
}

header("Location: /carrito.php");

?>