<?php

include_once './base-datos/bd.php';

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id_cliente'])){
        $query="SELECT * FROM cliente WHERE id_cliente =".$_GET['id_cliente'];
        $result=metodoGet($query);
        echo json_encode($result->fetch(PDO::FETCH_ASSOC));
    }else{
        $query="SELECT * FROM cliente";
        $result=metodoGet($query);
        echo json_encode($result->fetchAll());
    }
    header("HTTP/1.1 200 OK");
    exit();

}

if($_POST['METHOD']=='POST'){
    unset($_POST['METHOD']);
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_cliente = $_POST['apellido_cliente'];
    $correo_cliente = $_POST['correo_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];
    

    $query = "INSERT INTO cliente(nombre_cliente, apellido_cliente, correo_cliente, telefono_cliente)
     VALUES ('$nombre_cliente', '$apellido_cliente', '$correo_cliente', '$telefono_cliente')";
    $queryAutoIncrement = "SELECT MAX(id_cliente) AS id_cliente FROM cliente";
    $result = metodoPost($query, $queryAutoIncrement);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

if($_POST['METHOD']=='PUT'){
    unset($_POST['METHOD']);
    $id_cliente=$_GET['id_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_cliente = $_POST['apellido_cliente'];
    $correo_cliente = $_POST['correo_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];
    

    $query="UPDATE cliente SET nombre_cliente='$nombre_cliente', apellido_cliente='$apellido_cliente', 
    correo_cliente='$correo_cliente',
    telefono_cliente='$telefono_cliente' WHERE id_cliente='$id_cliente'";
    $result = metodoPut($query);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

if ($_POST['METHOD'] =='DELETE') {
    unset($_POST['METHOD']);
    $id_cliente = $_GET['id_cliente'];
    $query="delete from cliente where id_cliente='$id_cliente'";
    $result=metodoDelete($query);
    echo json_encode($result);
    header('HTTP/1.1 200 0K');
    exit();
}

?>