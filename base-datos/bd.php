<?php
    include_once 'conexion.php';

    function desconectar(){
        $GLOBALS['PDO']=null;
    }

    function metodoGet($query){
        try{
            conexion();
            $statement=$GLOBALS['PDO']->prepare($query);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();
            desconectar();
            return $statement;
        }catch(Exception $e){
            die("Error: ".$e);
        }
    }

    function metodoPost($query, $queryAutoIncrement){
        try{
            conexion();
            $statement=$GLOBALS['PDO']->prepare($query);
            $statement->execute();
            $idAutoIncrement=metodoGet($queryAutoIncrement)->fetch(PDO::FETCH_ASSOC);
            $result=array_merge($idAutoIncrement, $_POST);
            $statement->closeCursor();  
            desconectar();
            return $result;
        }catch(Exception $e){
            die("Error: ".$e);
        }
    }

    function metodoPut($query){
        try{
            conexion();
            $statement=$GLOBALS['PDO']->prepare($query);
            $statement->execute();
            $result=array_merge($_GET, $_POST);
            $statement->closeCursor();
            desconectar();
            return $result;
        }catch(Exception $e){
            die("Error: ".$e);
        }
    }

    function metodoDelete($query){
        try{
            conexion();
            $statement=$GLOBALS['PDO']->prepare($query);
            $statement->execute();
            $statement->closeCursor();
            desconectar();
            return 'Delete OK';
        }catch(Exception $e){
            die("Error: ".$e);
        }
    }
?>