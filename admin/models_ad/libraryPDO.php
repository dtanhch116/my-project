<?php
define("DB_HOST", "localhost");
define("DB_NAME", "xshop");
define("DB_USER", "root");
define("DB_PWK", "");

function pdo_get_connection(){
    $connec = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME."; charset=utf8",DB_USER,DB_PWK);
    return $connec;
}

function pdo_execute($sql){
    $sql_arg = array_slice(func_get_args(), 1);
    $connec = pdo_get_connection();
    $stmt = $connec -> prepare($sql);
    $stmt -> execute($sql_arg);
}

function pdo_query_all($sql){
    $sql_arg = array_slice(func_get_args(), 1);
    $connec = pdo_get_connection();
    $stmt = $connec -> prepare($sql);
    $stmt -> execute($sql_arg);
    $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function pdo_query_one($sql){
    $sql_arg = array_slice(func_get_args(), 1);
    $connec = pdo_get_connection();
    $stmt = $connec -> prepare($sql);
    $stmt -> execute($sql_arg);
    
    $data = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $data;
}