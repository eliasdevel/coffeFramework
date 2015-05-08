<?php
/**
 * Created by PhpStorm.
 * User: elias
 * Date: 08/05/15
 * Time: 02:16
 */
namespace core\library;

use core\library\DatabaseConnect as Connection;

class DatabaseInstructions
{

    public function __construct()
    {

    }

    public static function insert($table, $data = array())
    {
        $columns = array_keys($data);
        $parsedColumns = implode(',', $columns);

        $parsedColumnsForParms = ':' . implode(', :', $columns);
        $con = new Connection();
        $con->prepare("INSERT INTO $table($parsedColumns) VALUES($parsedColumnsForParms)")->execute($data);

    }
}