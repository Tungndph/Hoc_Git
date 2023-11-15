<?php

function pdo_get_connection() {
    $host = "mysql:host=localhost;dbname=duan1";
    $username = "root";
    $password = "";
    try {
        $connect = new PDO($host, $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connect;
    } catch(PDOException $e) {
        throw $e;
    }
}

function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function pdo_query($sql) {
    try {
        $connect = pdo_get_connection();
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    } catch(PDOException $e) {
        throw $e;
    }
}

function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

?>