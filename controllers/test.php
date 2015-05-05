<?php
use core\Input as Input;
class test extends \core\Controller{

    public function index(){
        view('test',array('var'=>Input::getString('t')));
    }
}