<?php
function view($name, $parms = array())
{
    ob_start();
    if (!(empty($parms))) foreach ($parms as $key => $parm) {
        $$key = $parm;
    }
    include "views/$name.php";
    return ob_get_contents();
}