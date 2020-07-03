<?php

session_start();

if($_POST['cantidad'] <= 0){
    echo json_encode(false);
}else{

    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = Array();
    }

    if(isset($_SESSION['carrito'][$_POST['producto']])){
        $_SESSION['carrito'][$_POST['producto']] += $_POST['cantidad'];
    }else{
        $_SESSION['carrito'][$_POST['producto']] = $_POST['cantidad'];
    }

    echo json_encode(true);
}

?>