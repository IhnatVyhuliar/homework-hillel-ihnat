<?php

$data = $_GET;

$dsn = "mysql:host=database;db_name=php_db;port=3306";
$user = "root";
$password = "secret";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $user, $password, $opt);
}catch (PDOException $exception){
    dd($exception->getMessage());
}
