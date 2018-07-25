<?php
namespace Controllers;

use Core\Controller as Controller;
use core\library\Path as Path;
use core\library\ConfigParser as Config;


class CanData extends Controller
{

    public function index()
    {
       

        $modelQuery = $this->model()->select([' cd.pgn ','pd.description','cd.data','cd.date_time'],'DISTINCT')->orderBy('cd.date_time')->desc();
        
        
        view('layout', [
            'title' => 'Lista Can',
            'contentView' => 'grid',
            'data' =>  [
                    'searchCols' => ['pgn'=> 'PGN' , 'description' => 'Descrição'],
                    'vals' => $modelQuery->result(),
                    'cols' =>['Pgn','Descrição','Dados','Data Hora'],
                    'link' => Path::baseUrl().'can_list/translate/'
                       ]
        ]);
       

    }
    public function translate($pgn ){
        $modelQuery = $this->model()->getTranslate($pgn);
        
        view('layout', [
            'title' => 'Lista Can',
            'contentView' => 'grid',
            'data' =>  [
                     'searchCols' => ['pgn'=> 'PGN' , 'description' => 'Descrição'],
                    'vals' => $modelQuery,
                    'cols' =>['Pgn','Descrição','Tamanho','Intervalo Transmissão','Acronym','Posicao','Spn Len','SPN','Descrição','Data Range','Oper Range','resolução']
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
