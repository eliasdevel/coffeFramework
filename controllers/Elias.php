<?php
use core\Input as Input;

class Elias extends \core\Controller
{

    public function index($parm = null)
    {
        view('test', array('var' => $parm));
    }
}