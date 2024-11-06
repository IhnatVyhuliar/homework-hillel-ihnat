<?php

spl_autoload_register( 'my_psr4_autoloader' );

function my_psr4_autoloader($class) {
    $class_path = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $class_path . '.php'; 

    //var_dump($file);
    if (!file_exists($file)) {
        throw new Exception("Class $class not found");
    }
    require_once $file;
}