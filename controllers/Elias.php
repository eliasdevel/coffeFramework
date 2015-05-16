<?php
use core\Controller as Controller;
use core\library\Path as Path;
use core\library\ConfigParser as Config;


class Elias extends Controller
{

    public function index($parm = null)
    {
       echo Path::baseUrl();

    }

    public function aaa($a, $b)
    {
        var_dump($a, $b);
    }
}
