<?php
use core\Controller as Controller;
use core\library\Path as Path;
use core\library\ConfigParser as Config;


class Elias extends Controller
{

    public function index($parm = null)
    {
        $this->model()->insertTest();
        echo Path::baseUrl();

    }

    public function form()
    {
        view('layout', array('contentView' => 'formTest'));
    }

    public function listRegisters()
    {
        view('layout', array('content' => view('listTest')));

    }


    public function save($id = false)
    {

    }

}
