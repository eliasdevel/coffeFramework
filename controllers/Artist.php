<?php
namespace Controllers;

use Core\Controller as Controller;
use core\library\Path as Path;
use core\library\ConfigParser as Config;


class Artist extends Controller
{

    public function index($parm = null)
    {
        view('layout', [
            'title'=>'Artistas',
            'base_url'=>Path::baseUrl(),
            'contentView' => 'listArtists',
            'data' =>[
               'list'=> $this->model()->result()
            ]
        ]);


    }

    public function form($id = null)
    {
        $action = $id ==null? Path::baseUrl().'/save_new': Path::baseUrl().'/save/'.(int) $id;
        $form_data = $id ==null? null: $this->model()->findById($id)->result()[0];
        view('layout', [
            'base_url'=>Path::baseUrl(),
            'contentView' => 'formArtist',
            'data' =>[
                'action_form' => $action,
                'form_data' => $form_data
            ]
//                ['form_values' => $this->model()->findById($var_dum)->result()]

        ]);
    }


    public function save_new(){
        return $this->save();
    }

    public function save($id = false)
    {


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
