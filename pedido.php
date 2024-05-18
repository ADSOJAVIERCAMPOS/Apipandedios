<?php

include_once './base-datos/bd.php';

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id_pedido'])){
        $query="select * from pedido where id_pedido=".$_GET['id_pedido'];
        $result=metodoGet($query);
        echo json_encode($result->fetch(PDO::FETCH_ASSOC));
    }else{
        $query="select * from pedido";
        $result=metodoGet($query);
        echo json_encode($result->fetchAll());
    }
    header("HTTP/1.1 200 OK");
    exit();

}

if($_POST['METHOD']=='POST'){
    unset($_POST['METHOD']);
    $cod_cliente = $_POST['cod_cliente'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $valor_pedido = $_POST['valor_pedido'];
    $cod_producto = $_POST['cod_producto'];
    $cantidad_producto = $_POST['cantidad_producto'];

    $query = "INSERT INTO pedido (cod_cliente, fecha_entrega, valor_pedido, cod_producto,
    cantidad_producto)
     VALUES ('$cod_cliente', '$fecha_entrega', '$valor_pedido', '$cod_producto','$cantidad_producto')";
    $queryAutoIncrement = "SELECT MAX(id_pedido) AS id_pedido FROM pedido";
    $result = metodoPost($query, $queryAutoIncrement);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

if($_POST['METHOD']=='PUT'){
    unset($_POST['METHOD']);
    $id_pedido = $_GET['id_pedido'];
    $cod_cliente = $_POST['cod_cliente'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $valor_pedido = $_POST['valor_pedido'];
    $cod_producto = $_POST['cod_producto'];
    $cantidad_producto = $_POST['cantidad_producto'];

    $query="UPDATE pedido SET cod_cliente='$cod_cliente',
     fecha_entrega='$fecha_entrega', 
     valor_pedido='$valor_pedido', cod_producto='$cod_producto',
     cantidad_producto='$cantidad_producto' WHERE id_pedido='$id_pedido'";
    $result = metodoPut($query);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

if ($_POST['METHOD'] =='DELETE') {
    unset($_POST['METHOD']);
    $id_pedido = $_GET['id_pedido'];
    $query="DELETE FROM pedido WHERE id_pedido='$id_pedido'";
    $result=metodoDelete($query);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

?>