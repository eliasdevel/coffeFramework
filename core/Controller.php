<?php
namespace Core;
/**
 * Created by PhpStorm.
 * User: elias
 * Date: 04/05/15
 * Time: 22:40
 */

use Core\Loader as Loader;

class Controller
{
    public function __construct()
    {

    }

    public  function model($name = false)
    {
        if(!$name){
        $class = get_called_class() . 'Model';

        }else{
            $class = $name . 'Model';
        }
        $class = str_replace('Controllers\\','',$class);
        $class = "Models\\$class";
        return new $class;
    }

}
