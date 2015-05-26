<?php
use core\Model as Model;

class EliasModel extends Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'user';
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


    public function findByName()
    {

    }

    public function findByEmail()
    {

    }
}