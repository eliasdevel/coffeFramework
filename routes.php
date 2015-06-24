<?php
use core\Routes as Routes;
use core\Loader as Loader;

$routes = new Routes();

//Set Your Routes Here
$routes->setRoute('test','test');
$routes->setRoute('elias','Elias');

$routes->setRoute('elias/aaa','Elias','aaa',2);
$routes->setRoute('elias/form','Elias','form');
$routes->setRoute('elias/save','Elias','save',1);

new Loader($routes->getRoutes(),$routes->getAccess());