<?php

session_start();

if(isset($_GET['prod'])){
    $rem = $_GET['prod'];
    unset($_SESSION['carrito'][$rem]);
    echo json_encode(true);
}else{
    echo json_encode(false);
}

?>