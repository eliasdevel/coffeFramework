<?php
use core\Model as Model;

class EliasModel extends Model{
    private $table = 'teste';
    public function insertTest(){

        $this->insert($this->table,['nome'=>'Elias']);
        $this->update($this->table,['nome'=>'Zebu'],2);
        $this->delete($this->table,2);

        var_dump($this->selectWhithoutFilter("Select * from $this->table"));

    }
}