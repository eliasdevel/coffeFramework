<?php
namespace core;

use core\library\DatabaseInstructions as DB;

class Model extends DB
{
    public $table;
    private $data;
    public function __construct(){

    }

    public function setFilters($filter_input_array_rules){
        $this->data = filter_input_array(INPUT_POST, $filter_input_array_rules);
    }
    public function save($id = false)
    {


        if(empty($this->data)) echo die('Please set the filters in your model');
        return $id ? $this->update($this->table, $this->data, $id) : $this->insert($this->table, $this->data);
    }




}