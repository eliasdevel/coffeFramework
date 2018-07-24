<?php
namespace Models;

use Core\Model as Model;

class CanDataModel extends Model
{
    public function __construct()
    {
        $this->table = 'can_data cd LEFT JOIN pgn_description pd on pd.pid = cd.pgn ';
        parent::__construct();


        $this->setFilters([
            'name'     =>
                [
                    'filter'  => FILTER_VALIDATE_REGEXP,
                    'flags'   => FILTER_SANITIZE_STRING | FILTER_NULL_ON_FAILURE,
                    'options' => $this->stringLength(4, 20)
                ],

            'password' =>
                [
                    'filter'  => FILTER_SANITIZE_STRING,
                    'flags'   => FILTER_SANITIZE_STRING | FILTER_NULL_ON_FAILURE,
                    'options' => $this->stringLength(4, 20)
                ]
        ]);



    }



}