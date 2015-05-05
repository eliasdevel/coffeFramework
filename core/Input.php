<?php
namespace core;
class Input
{

    public function __construct()
    {
        if (get_parent_class() != 'core/Controller' AND get_parent_class() != 'core/Model') {
            return false;
        }
    }

    public static function postString($var)
    {
        return filter_input(INPUT_POST, $var, FILTER_SANITIZE_STRING);
    }

    public static function postInt($var)
    {
        return filter_input(INPUT_POST, $var, FILTER_VALIDATE_INT);
    }

    public static function postFloat($var)
    {

        return filter_input(INPUT_POST, $var, FILTER_VALIDATE_FLOAT);
    }

    public static function postEmail($var)
    {
        return filter_input(INPUT_POST, $var, FILTER_VALIDATE_EMAIL);
    }

    public static function postIp($var)
    {
        return filter_input(INPUT_POST, $var, FILTER_VALIDATE_IP);
    }

    public static function getString($var)
    {
        return filter_input(INPUT_GET, $var, FILTER_SANITIZE_STRING);
    }

    public static function getInt($var)
    {
        return filter_input(INPUT_GET, $var, FILTER_VALIDATE_INT);
    }

    public static function getFloat($var)
    {

        return filter_input(INPUT_GET, $var, FILTER_VALIDATE_FLOAT);
    }

    public static function getEmail($var)
    {
        return filter_input(INPUT_GET, $var, FILTER_VALIDATE_EMAIL);
    }

    public static function getIp($var)
    {
        return filter_input(INPUT_GET, $var, FILTER_VALIDATE_IP);
    }

}