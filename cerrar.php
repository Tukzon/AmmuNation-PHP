<?php
//PARA CERRAR SESIÓN
session_start();

$_SESSION['conexion'] = NULL;

session_destroy();

header('Location: index.php');
?>