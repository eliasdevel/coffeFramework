<?php
use Core\Model as Model;

class EliasModel extends Model
{
    public function __construct()
    {
        $this->table = 'user';
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

        $this->likeName('Elias');

        $this->findByName('Elias');

        var_dump($this->result());
    }



}