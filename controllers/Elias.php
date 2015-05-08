<?php
use core\Controller as Controller;
use core\library\Path as Path;
use core\library\ConfigParser as Config;

class Elias extends Controller
{

    public function index($parm = null)
    {
        $this->model()->insertTest();
    }
}