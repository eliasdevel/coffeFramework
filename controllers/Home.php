<?php
namespace Controllers;

use Core\Controller as Controller;
use core\library\Path as Path;
use core\library\ConfigParser as Config;


class Home extends Controller
{

    public function index($parm = null)
    {
        view('layout', [
            'base_url'=>Path::baseUrl(),
            'contentView' => 'apresentation',
            'data' =>[]]);
    }

    public function form($var_dum = null)
    {
        view('layout', ['contentView' => 'formTest',
            'data' =>
                ['form_values' => $this->model()->findById($var_dum)->result()]

        ]);
    }

    public function listRegisters()
    {
        view('layout', array('content' => view('listTest')));

    }


    public function save($id = false)
    {
        if ($this->model()->save($id)) ;

    }

}
