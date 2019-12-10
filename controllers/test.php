<?php
use Core\Input as Input;
class Test extends \Core\Controller{

    public function index(){
        view('test',array('var'=>'a'));
    }
}