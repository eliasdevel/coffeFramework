<?php
namespace core;
/**
 * Created by PhpStorm.
 * User: elias
 * Date: 04/05/15
 * Time: 22:40
 */

class Controller
{
    public function __construct()
    {

    }

    public  function model($name = false)
    {
        if(!name){
        $class = get_called_class() . 'Model';
        }else{
            $class = $name . 'Model';
        }
        require './models/'.$class. '.php';
        return new $class;
    }

}
