<?php

if(!isset($_GET['id'])){
    echo json_encode(false);
}else{
    session_start();
    if(!isset($_SESSION['conexion'])){
        //echo json_encode(false);
    } // else{
        require '../../vendor/autoload.php';

        $uri="mongodb://localhost";
        $client=new MongoDB\Client($uri);
        $orden = $client->tienda->ordenes->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
        $prods = Array();
        $total = Array();
        $json = Array();

        foreach($orden['productos'] as $producto=>$cantidad){
            $prod = $client->tienda->productos->findOne(['_id' => new MongoDB\BSON\ObjectID($producto)]);
            $prods = ["idProducto"=>$producto, "nombreProducto"=>$prod['name'], "cantidad"=>$cantidad];
            array_push($json,$prods);
        }

        $total = ["total"=>$orden['total']];

        array_push($json,$total);
        echo json_encode($json);
    //}

}

?>