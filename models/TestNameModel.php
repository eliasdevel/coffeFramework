<?php
use Core\Model as Model;

class TestNameModel extends Model{
    private $table = 'teste';
    public function insertTest(){

        $this->insert($this->table,['nome'=>'Elias']);

    }
}