<?php
use Core\Loader as Loader;
use Core\Routes as Routes;

$routes = new Routes();

//Set Your Routes Here
$routes->setRoute('test','test');

$routes->setRoute('can_list','CanData');

$routes->setRoute('elias/aaa','Elias','aaa',2);
$routes->setRoute('elias/form','Elias','form');
$routes->setRoute('elias/save','Elias','save',1);

new Loader($routes->getRoutes(),$routes->getAccess());