<?php

include_once './base-datos/bd.php';

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id_producto'])){
        $query="SELECT * FROM producto WHERE id_producto=".$_GET['id_producto'];
        $result=metodoGet($query);
        echo json_encode($result->fetch(PDO::FETCH_ASSOC));
    }else{
        $query="SELECT * FROM producto";
        $result=metodoGet($query);
        echo json_encode($result->fetchAll());
    }
    header("HTTP/1.1 200 OK");
    exit();

}

if($_POST['METHOD']=='POST'){
    unset($_POST['METHOD']);
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $valor_producto = $_POST['valor_producto'];
   

    $query = "INSERT INTO producto (nombre_producto, descripcion_producto, valor_producto)
     VALUES ('$nombre_producto', '$descripcion_producto', '$valor_producto')";
    $queryAutoIncrement = "SELECT MAX(id_producto) AS id_producto FROM producto";
    $result = metodoPost($query, $queryAutoIncrement);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

if($_POST['METHOD']=='PUT'){
    unset($_POST['METHOD']);
    $id_producto=$_GET['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $valor_producto = $_POST['valor_producto'];
   
    $query="UPDATE producto SET nombre_producto='$nombre_producto', descripcion_producto='$descripcion_producto', 
    valor_producto='$valor_producto' WHERE id_producto='$id_producto'";
    $result = metodoPut($query);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

if ($_POST['METHOD'] =='DELETE') {
    unset($_POST['METHOD']);
    $id_galpon = $_GET['id_producto'];
    $query="DELETE FROM producto WHERE id_producto='$id_producto'";
    $result=metodoDelete($query);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

?>