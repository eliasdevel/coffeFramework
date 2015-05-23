<?php
use core\Model as Model;

class EliasModel extends Model{
    public function __construct(){
        parent::__construct();

        $this->table = 'teste';
        $this->setFilters([]);
    }
    public function insertTest(){

        $this->save();

        var_dump($this->selectWhithoutFilter("Select * from $this->table"));

    }

    public function findByName(){

    }
    public function findByEmail(){

    }
}