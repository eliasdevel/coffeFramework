<?php
spl_autoload_register(function ($class_name) {
    $parts = explode('\\', $class_name);
    // var_dump($parts);
    if (file_exists($file = lcfirst(implode('/', $parts)) . '.php')){
        require $file;
    }
});



