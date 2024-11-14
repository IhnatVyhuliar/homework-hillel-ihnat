<?php
require_once('vendor/autoload.php');
require_once('src/autoload.php');

// use Classes\Color;
// use Classes\Test;
use Classes\User;
use Exceptions\CustomException;

dd("hello");
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

# SELECT - що?
# FROM - звідки?
# [JOIN] - разом з ким?
# [WHERE] WHERE ..... AND|OR - фільтруємо
# [AND] [OR] - ще фільтруємо
# [GROUP BY - групуємо
# HAVING] - same as WHERE - фільтруємо те що згрупували
# [ORDER BY] - сортуємо що отримали
# [LIMIT] - встановлюємо ліміт