<?php
/**
 * Created by PhpStorm.
 * User: elias
 * Date: 08/05/15
 * Time: 02:16
 */
namespace Core\library;

use Core\library\DatabaseConnect as Connection;

class DatabaseInstructions
{
    private $stringWhere = array();
    private $whereArray = array();
    private static $parms = [
        'int' => 1,
        'string' => 2,
        'boolean' => 5,
    ];

    public function __construct()
    {

    }

    public  function insert($table, $data = array())
    {

        $columns = array_keys($data);
        $parsedColumns = implode(',', $columns);

        $parsedColumnsForParms = ':' . implode(', :', $columns);
        $con = new Connection();
//        var_dump("INSERT INTO $table($parsedColumns) VALUES($parsedColumnsForParms)");
//        die;
        $con->prepare("INSERT INTO $table($parsedColumns) VALUES($parsedColumnsForParms)")->execute($data);

    }

    public  function update($table, $data, $id)
    {
        $id = (int) $id;
        $columns = array_keys($data);
        foreach ($columns as $col) {
            $parsedColumns[] = "$col = :$col";
        }
        $parsedColumns = implode(',', $parsedColumns);

        $con = new Connection();
        return $con->prepare("UPDATE $table SET $parsedColumns WHERE id = $id")->execute($data);

    }

    public static function delete($table, $id)
    {
        $id = (int) $id;

        $con = new Connection();
        return $con->prepare("DELETE FROM $table  WHERE id = $id")->execute();
    }

    public function selectById($table, $id){
        $id = (int) $id;
        return $this->selectWhithoutFilter("Select * from $table where id = $id");
    }




    protected function execute($sql)
    {
        $con = new Connection();

        return $con->exec($sql);
    }
    public function selectWhithoutFilter($instruction)
    {
//        var_dump("aa");
        $con = new Connection();

        $stm = $con->query($instruction);
        return $stm->fetchAll();
    }



}
