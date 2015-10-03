<?php
spl_autoload_register(function ($class_name) {
    $parts = explode('\\', $class_name);
    if (file_exists($file = lcfirst(implode('/', $parts)) . '.php')){
        require $file;
    }
});


