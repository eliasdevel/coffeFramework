<?php
use Core\Loader as Loader;
use Core\Routes as Routes;

$routes = new Routes();

//Set Your Routes Here
//->setRoute('test','test');
$routes->setRoute('','Home');
$routes->setRoute('musics','Music');
$routes->setRoute('musics/form','Music','form');
$routes->setRoute('musics/save_new','Music','save');
$routes->setRoute('musics/save','Music','save',1);
$routes->setRoute('musics/edit','Music','edit',1);
$routes->setRoute('musics/delete','Music','delete',1);

$routes->setRoute('artists','Artist');
$routes->setRoute('artists/form','Artist','form');
$routes->setRoute('artists/save_new','Artist','save');
$routes->setRoute('artists/save','Artist','save',1);
$routes->setRoute('artists/edit','Artist','edit',1);
$routes->setRoute('artists/delete','Artist','delete',1);

new Loader($routes->getRoutes(),$routes->getAccess());