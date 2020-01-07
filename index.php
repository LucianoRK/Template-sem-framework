<?php

session_start();
set_time_limit(60);
spl_autoload_register("autoload");

function autoload($class)
{
    if (is_readable(dirname(__FILE__) . "/app/controllers/" . $class . ".php")) {
        include(dirname(__FILE__) . "/app/controllers/" . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/app/models/' . $class . ".php")) {
        include(dirname(__FILE__) . '/app/models/' . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/config/' . $class . ".php")) {
        include(dirname(__FILE__) . '/config/' . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/Library/' . $class . ".php")) {
        include(dirname(__FILE__) . '/Library/' . $class . ".php");
    }
}

$core = new Core();
$core->run();