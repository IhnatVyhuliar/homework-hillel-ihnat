<?php

class Product
{
    public int $id, $quantity;

}


function db(): PDO
{
    $dsn = "mysql:host=database;db_name=php_db;port=3306";
    $user = "root";
    $password = "secret";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    return new PDO($dsn, $user, $password, $opt);

};

$query = db()->prepare("select * from parks");
$qery->execute();

dd($qery->fetchObject(Product::class));