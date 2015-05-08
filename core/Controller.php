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

    public  function model()
    {
        require './models/'.get_called_class() . 'Model.php';
        $class = get_called_class() . 'Model';
        return new $class;
    }

}