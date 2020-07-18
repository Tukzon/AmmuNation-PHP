<?php

session_start();

if($_POST['cantidad'] <= 0){
    echo json_encode('No se ha encontrado producto');
}else{

    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = Array();
    }

    if(isset($_SESSION['carrito'][$_POST['producto']])){
        $_SESSION['carrito'][$_POST['producto']] += $_POST['cantidad'];
    }else{
        $_SESSION['carrito'][$_POST['producto']] = $_POST['cantidad'];
    }
	setcookie("carrito",$_SESSION['carrito'], time()+3600, "/");
    echo json_encode('Producto agregado');
}

?>