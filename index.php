<?php
require_once('vendor/autoload.php');
//require_once('src/autoload.php');

// // use Classes\Color;
// // use Classes\Test;
// use Classes\User;
// use Exceptions\CustomException;

// dd("hello");
// try{
//     $user = new User();
//     $user->setName("hello");
//     $user->setEmail("email");
//     $user->setAge(32);
//     echo $user->getName()."<br>";
//     echo $user->getEmail()."<br>";
//     echo $user->getAge()."<br>";
    
//     var_dump($user->getAll());
//     $user->setEmail("hello"); //error
// }catch (CustomException $e){
//     echo 'Caught exception: ',  $e->getMessage(), "\n";
// }

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