<?php

/**
 * Created by PhpStorm.
 * User: elias
 * Date: 04/05/15
 * Time: 23:32
 */
namespace Core;


class Loader

{

    private $path = array();
    private $request_path = array();
    private $file;

    public function __construct($routes, $acess)
    {
        spl_autoload_register([$this,'load']);
        require 'load.php';
        $call = self::parsePath()->call_parts[0];
        if (isset(self::parsePath()->call_parts[1])) $call .= '/' . self::parsePath()->call_parts[1];

        if (isset($acess->$call->parms)) if (count(self::parsePath()->call_parts) - 2 <> $acess->$call->parms) {
            view('404');
            die;
        }

        if (in_array($call, $routes)) {
            $controller = $acess->$call->controller;
            $function = $acess->$call->function;
            if ($this->file = file_exists("controllers/$controller.php")) {
                $this->load('controllers/'.$controller);
            }
            $controller = new $controller;
            if (isset($acess->$call->parms)) {
                $parms = [];

                for ($i = 1; $i <= $acess->$call->parms; $i++) {
                    $val = self::parsePath()->call_parts[$i + 1];
                    $parms[$i] = $val;
                }
                call_user_func_array([$controller, $function], $parms);
            }else{
                call_user_func([$controller,$function]);
            }

        } else {
            view('404');
            die;
        }

    }


    public static function load($load){
        require "$load".'.php';
    }


    private function parsePath()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $this->request_path = explode('?', $_SERVER['REQUEST_URI']);

            $this->path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
            $this->path['call_utf8'] = substr(urldecode($this->request_path[0]), strlen($this->path['base']) + 1);
            $this->path['call'] = utf8_decode($this->path['call_utf8']);
            if ($this->path['call'] == basename($_SERVER['PHP_SELF'])) {
                $this->path['call'] = '';
            }
            $this->path['call_parts'] = explode('/', $this->path['call']);

            if (isset($this->request_path[1])) $this->path['query_utf8'] = urldecode($this->request_path[1]);
            if (isset($this->request_path[1])) $this->path['query'] = utf8_decode(urldecode($this->request_path[1]));
            if (isset($this->path['query'])) {
                $vars = explode('&', $this->path['query']);
                foreach ($vars as $var) {
                    $t = explode('=', $var);
                    $this->path['query_vars'][$t[0]] = $t[1];
                }
            }
        }
        if ($this->path['call'] == '') $this->path['call'] = '/';
        return (object)$this->path;
    }


}