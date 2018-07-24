<?php
namespace Controllers;

use Core\Controller as Controller;
use core\library\Path as Path;
use core\library\ConfigParser as Config;


class CanData extends Controller
{

    public function index()
    {
      
        $modelQuery = $this->model()->select(['cd.pgn','pd.description','cd.data','cd.date_time'],'DISTINCT')->orderBy('cd.date_time')->desc();
        if(!empty($_GET['pgn'])) $modelQuery->where(['cd.pgn',$_GET['pgn']]);
        if(!empty($_GET['description'])) $modelQuery->where(['pd.description','ilike',"'%".$_GET['description']."%'"]); 
        
        view('layout', [
            'title' => 'Lista Can',
            'contentView' => 'grid',
            'data' =>  [
                    'searchCols' => ['pgn'=> 'PGN' , 'description' => 'Descrição'],
                    'vals' => $modelQuery->result(),
                    'cols' =>['Pgn','Descrição','Dados','Data Hora']
                       ]
        ]);
       

    }

    public function form($var_dum = null)
    {
        view('layout', ['contentView' => 'formTest',
            'data' =>
                ['form_values' => [1,1,1,1,1]]

        ]);
    }

    public function listRegisters()
    {
        view('layout', array('content' => view('listTest')));

    }


    public function save($id = false)
    {
        if ($this->model()->save($id)) ;

    }

}
