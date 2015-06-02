<?php
namespace Core;

use Core\library\DatabaseInstructions as DB;

class Model extends DB
{
    public $table;
    private $data;
    private $findBy;
    private $where;
    private $select = '*';

    public function __construct(){
        $ret = $this->selectWhithoutFilter("SELECT COLUMN_NAME as c FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = (SELECT database() )AND TABLE_NAME = '{$this->table}';");
        foreach($ret as $column){
            $this->findBy[] = 'findBy'. ucfirst($column[0]);
        }
    }

    function defaultSelect($select = '*'){
        $this->select = $select;
    }

    function __call($func, $params){

        if(in_array($func, $this->findBy)){
            $column = str_replace('findBy','',$func);
            $column = strtolower($column);
            count($params>1) ? $this->where[]= " ( $column LIKE '%" .implode("%' OR $column LIKE %'" ,$params) ."%' ) " : $this->where[] = " $column LIKE '%{$parms[0]}%'";
            var_dump($this->where);
        }
        count($this->where)>1? $where = " WHERE ". implode(' AND ',$this->where): count($this->where == 1)? $where = " WHERE ".$this->where[0]: $where = '';
        $sql = "SELECT $this->select FROM $this->table $where";
        return ($this->selectWhithoutFilter($sql));
    }
    public function setFilters($filter_input_array_rules){
        $this->data = filter_input_array(INPUT_POST, $filter_input_array_rules);
    }
    public function save($id = false)
    {
        if(empty($this->data)) echo die('Please set the filters in your model');
        return $id ? $this->update($this->table, $this->data, $id) : $this->insert($this->table, $this->data);
    }


    public function getById($id){
        return $this->selectById($this->table,$id);
    }

    public function stringLength($min =0 ,$max =0){
        return ['regexp'=>"/^[a-zA-Z0-9záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{".$min.",".$max."}$/"];
    }


}