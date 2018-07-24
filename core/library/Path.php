<?php
namespace Core\library;

class Path
{

    public static function baseUrl()
    {
        if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
        $parts = explode('/', $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
       
        return $parts[0] . '//' . $parts[2].'/';
    }
}
