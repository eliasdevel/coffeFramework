# coffeeFramework
Basic usage:

In the file routes you declare your route, Controller to acess, function:default is index , and number of parms:default null  



Example file routes.php:

```
<?php
use core\Routes as Routes;
use core\Loader as Loader;
$routes = new Routes();

//Set Your Routes Here
$routes->setRoute('elias/aaa','Elias','aaa',2);

//Example default route for index call of Elias Controller
$routes->setRoute('elias','Elias');

new Loader($routes->getRoutes(),$routes->getAccess());

```

Now you needing create the file in controllers directory, for your respective access to controller;

file: controllers/Elias.php

```
<?php
use core\Controller as Controller;
use core\library\Path as Path;
use core\library\ConfigParser as Config;


class Elias extends Controller
{

    public function index($parm = null)
    {
      //Call to EliasModel in models directory default call to ControllerName+Model.
      //if you use $this->model('Name')->insertTest(); the call is for NameModel
        $this->model()->insertTest();
      
      //Base url function usage
       echo Path::baseUrl();

    }

    public function aaa($a, $b)
    {
        //function call test
        var_dump($a, $b);
    }
}


```


file: models/EliasModel.php
```
<?php
use core\Model as Model;

class EliasModel extends Model{
    private $table = 'teste';
    public function insertTest(){
        
        //Database default Parser With PDO Acess
        $this->insert($this->table,['nome'=>'Elias']);
        $this->update($this->table,['nome'=>'Zebu'],2);
        $this->delete($this->table,2);

        var_dump($this->selectWhithoutFilter("Select * from $this->table"));

    }
}
```
