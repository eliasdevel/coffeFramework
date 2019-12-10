<?php
namespace Models;

use Core\Model as Model;

class MusicArtistModel extends Model
{
    public function __construct()
    {
        $this->table = 'music_artist_relation';
        parent::__construct();
        $this->setFilters([
            'artist_id' =>
                [
                    'filter'  => FILTER_SANITIZE_STRING,
                    'flags'   => FILTER_VALIDATE_INT,
                ],
            'music_id' =>
                [
                    'filter'  => FILTER_SANITIZE_STRING,
                    'flags'   => FILTER_VALIDATE_INT,
                ]
        ]);



    }

    public function deleteArtistRelation($id)
    {
//        var_dump($this->findByartist_id($id)->result()[0]['id']);
//        die;
    }



}