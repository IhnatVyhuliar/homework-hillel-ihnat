<?php
require_once('src/autoload.php');

use Classes\Color;
use Classes\Test;
use Classes\User;
use Exceptions\CustomException;


try{
    $user = new User();
    $user->setName("hello");
    $user->setEmail("email");
    $user->setAge(32);
    echo $user->getName()."<br>";
    echo $user->getEmail()."<br>";
    echo $user->getAge()."<br>";

    var_dump($user->getAll());
    $user->setEmail("hello"); //error
}catch (CustomException $e){
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

