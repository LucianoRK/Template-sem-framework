<?php

spl_autoload_register("autoload");

function autoload($class) {
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

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router("http://localhost/raiz");

$router->namespace("ControladorLogin");

$router->group(null);

$router->get("/", "LoginController:login");

$router->dispatch();

if ($router->error()) {
    var_dump($router->error());
}