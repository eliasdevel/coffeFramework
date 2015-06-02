<?php
use Core\Input as Input;
class test extends \Core\Controller{

    public function index(){
        view('test',array('var'=>Input::getString('t')));
    }
}