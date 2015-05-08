<?php
use core\Model as Model;

class EliasModel extends Model{
    private $table = 'teste';
    public function insertTest(){

        $this->insert($this->table,['id'=>2,'nome'=>'Elias']);

    }
}