<?php
namespace Controllers;

use Core\Controller as Controller;
use Core\Input;
use core\library\Path as Path;
use core\library\ConfigParser as Config;


class Music extends Controller
{

    public function index($parm = null)
    {
        view('layout', [
            'title'=>'Músicas',
            'base_url'=>Path::baseUrl(),
            'contentView' => 'listMusics',
            'data' =>[
               'list'=> $this->model()->result()
            ]
        ]);


    }

    public function form($id = null)
    {


        $action = $id ==null? Path::baseUrl().'/save_new': Path::baseUrl().'/save/'.(int) $id;
        $form_data = $id ==null? null: $this->model()->findById($id)->result()[0];
        $artist_ids_selected = $this->model('MusicArtist')->findByMusic_id((int) $id)->result();
        $selected_ids =[];
        foreach ($artist_ids_selected as $id){
            $selected_ids[] = $id['artist_id'];
        }

        view('layout', [
            'base_url'=>Path::baseUrl(),
            'contentView' => 'formMusic',
            'data' =>[
                'action_form' => $action,
                'form_data' => $form_data,
                'selected_artists' => $selected_ids ,
                'artists' => $this->model('Artist')->result()
            ]

        ]);
    }



    public function save_new(){
        return $this->save();
    }

    public function save($id = false)
    {
        $this->model('MusicArtist')->deleteMusicRelations((int) $id);

        foreach ($_POST['artists'] as $artist_id){
           $this->model('MusicArtist')->insert('music_artist_relation',['artist_id'=> $artist_id,'music_id'=>$id]);
        }

        $base = Path::baseUrl();
        if($this->model()->save($id)){
            header("Location: $base");
        }
    }

     public function edit($id = false)
    {
        $this->form($id);
    }

    public function delete($id = false)
    {
        $base = Path::baseUrl();
        if($this->model()->delete($this->model()->table,$id)){
            header("Location: $base");
        }
    }

}
