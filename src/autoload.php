<?php

spl_autoload_register( 'my_psr4_autoloader' );

function my_psr4_autoloader($class) {
    $class_path = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $class_path . '.php'; 

    if (file_exists($file)) {
        require $file;
    }
}