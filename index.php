<?php
require_once('vendor/autoload.php');

use Solid\Open\Classes\Logger;

use Solid\Open\Classes\Delivery;
use Solid\Open\Classes\LogFormatter;

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




$delivery = new Delivery();
$log_formatter = new LogFormatter();


$logger = new Logger($log_formatter, $delivery, 'with_date', 'by_email');
$logger->log('Emergency error! Please fix me!');
