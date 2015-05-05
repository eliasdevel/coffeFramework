<?php
use core\Routes as Routes;
use core\Loader as Loader;
$routes = new Routes();

//Set Your Routes Here
$routes->setRoute('/','test');

new Loader($routes->getRoutes(),$routes->getAccess());