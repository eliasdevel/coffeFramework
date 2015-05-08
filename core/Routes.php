<?php
namespace core;


class Routes
{
    private $routes = array();
    private $access = array();


    public function setRoute($route, $controller, $function = 'index', $parms = null)
    {
        $this->routes[] = $route;
        $this->access[$route] = (object)[
            'controller' => $controller,
            'function' => $function,
            'parms' => $parms,
        ];
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getAccess()
    {
        return (object)$this->access;
    }

}