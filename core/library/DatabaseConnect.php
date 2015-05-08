<?php
/**
 * Use PDO only
 */
namespace core\library;

use core\library\ConfigParser as Parse;

class DatabaseConnect extends \PDO
{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;

    public function __construct()
    {
        $config = Parse::database();
        $this->engine = $config->driver;
        $this->host = $config->server;
        $this->database = $config->database;
        $this->user = $config->user;
        $this->pass = $config->password;
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
        parent::__construct( $dns, $this->user, $this->pass );

    }


}
