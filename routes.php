<?php
use core\Loader as Loader;
use core\Routes as Routes;

$routes = new Routes();

//Set Your Routes Here
$routes->setRoute('test','test');
$routes->setRoute('elias','Elias');

$routes->setRoute('elias/aaa','Elias','aaa',2);
$routes->setRoute('elias/form','Elias','form');
$routes->setRoute('elias/save','Elias','save',1);

new Loader($routes->getRoutes(),$routes->getAccess());