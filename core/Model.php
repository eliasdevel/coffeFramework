<?php
namespace Core;

use Core\library\DatabaseInstructions as DB;

class Model extends DB
{
    public $table;
    private $data;
    private $findBy;

    private $where;
    private $orderBy;
    private $select = '*';
    private $tabs = [];

    public function __construct(){
        // $ret = $this->selectWhithoutFilter("SELECT COLUMN_NAME as c FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = (SELECT database() ) AND TABLE_NAME = '{$this->table}';");
        // foreach($ret as $column){
        //     $this->like[] = 'like'. ucfirst($column[0]);
        //     $this->findBy[] = 'findBy'. ucfirst($column[0]);
        // }
    }

    function defaultSelect($select = '*'){
        $this->select = $select;
    }

    function __call($func, $parms){
        $this->parser($func,$parms);
        return $this;
    }
    
    public function select($arr,$distinct = false){
        $this->select = implode(',',$arr);
        $distinct ?  $this->select = " DISTINCT $this->select" : null ;
        return $this;
    }

    public function orderBy($col){
        $this->orderBy = " ORDER BY $col ";
        return $this;
    }
    public function desc(){
        $this->orderBy .= " DESC ";
        return $this;
    }
    public function asc(){
        $this->orderBy .= " ASC ";
        return $this;
    }
    public function where($arr){
        
       count($arr) == 2 ?  $this->where[] = implode('=' ,$arr) : $this->where[] = " $arr[0] $arr[1] $arr[2]";
        return $this;
    }

    public function limit($num){

        $this->limit = " LIMIT $num";
        return $this;
    }

    public function setFilters($filter_input_array_rules){
        $this->data = filter_input_array(INPUT_POST, $filter_input_array_rules);
    }
    public function save($id = false)
    {
        if(empty($this->data)) echo die('Please set the filters in your model');
        return $id ? $this->update($this->table, $this->data, $id) : $this->insert($this->table, $this->data);
    }

    public function result(){
        !empty($this->where) ? $where = " WHERE ". implode(' AND ',$this->where) :  $where = '';
        !empty($this->orderBy) ? $orderBy = $this->orderBy :  $orderBy = '';
        $sql = "SELECT $this->select FROM $this->table $where $orderBy";
        return $this->selectWhithoutFilter($sql);
    }

    public function getById($id){
        return $this->selectById($this->table,$id);
    }

    public function stringLength($min =0 ,$max =0){
        return ['regexp'=>"/^[a-zA-Z0-9záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{".$min.",".$max."}$/"];
    }
    

    private function parser($func,$parms){
        //like parser
        if(in_array($func, $this->like)){
            $column = str_replace('like','',$func);
            $column = strtolower($column);
            count($parms) > 1 ? $this->where[]= " ( $column LIKE '%" .implode("%' OR $column LIKE '%" ,$parms) ."%' ) " : $this->where[] = " $column LIKE '%{$parms[0]}%'";
        }
        //equals parser
        else if(in_array($func, $this->findBy)){
            $column = str_replace('findBy','',$func);
            $column = strtolower($column);
            count($parms) > 1 ? $this->where[] = " $column IN ('" .implode("','" ,$parms) ."') " : $this->where[] = " $column = '{$parms[0]}' ";
        }
    }




}