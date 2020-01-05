<?php

function autoload($class) {
   if (is_readable(dirname(__FILE__) . "/app/models/" . $class . ".php")) {
       include(dirname(__FILE__) . "/app/models/" . $class . ".php");
   }
   if (is_readable(dirname(__FILE__) . '/library/' . $class . ".php")) {
       include(dirname(__FILE__) . '/library/' . $class . ".php");
   }
}

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router("http://localhost/projeto/");

$router->group(null);

$router->get("/", function($data) {
   echo "<h1> Olá mundo </h1>";
   var_dump($data);
});


$router->dispatch();