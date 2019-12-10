<?php
namespace Models;

use Core\Model as Model;

class ArtistModel extends Model
{
    public function __construct()
    {
        $this->table = 'artists';
        parent::__construct();
        $this->setFilters([
            'name'     =>
                [
                    'filter'  => FILTER_VALIDATE_REGEXP,
                    'flags'   => FILTER_SANITIZE_STRING | FILTER_NULL_ON_FAILURE,
                    'options' => $this->stringLength(1, 20)
                ],

//            'artist_id' =>
//                [
//                    'filter'  => FILTER_SANITIZE_STRING,
//                    'flags'   => FILTER_VALIDATE_INT,
//                    'options' => $this->stringLength(4, 20)
//                ]
        ]);



    }



}