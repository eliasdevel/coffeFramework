<?php
namespace Core\library;

use Core\library\Path as Path;

class ConfigParser
{
    public static function database()
    {
       return (object) parse_ini_file('./config/database.ini');
    }
    public static function application()
    {
       return (object) parse_ini_file('./config/application.ini');
    }

}