<?php

session_start();
set_time_limit(60);
spl_autoload_register("autoload");

require 'router.php';

function autoload($class)
{
    if (is_readable(dirname(__FILE__) . "/app/controllers/" . $class . ".php")) {
        include(dirname(__FILE__) . "/app/controllers/" . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/app/models/' . $class . ".php")) {
        include(dirname(__FILE__) . '/app/models/' . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/database/' . $class . ".php")) {
        include(dirname(__FILE__) . '/database/' . $class . ".php");
    }
    if (is_readable(dirname(__FILE__) . '/library/' . $class . ".php")) {
        include(dirname(__FILE__) . '/library/' . $class . ".php");
    }
}

CORE::run();
SESSION::checkLoggedInUser();


/* Exemplo de criptografia */
$senha = '123';

/* crio a hash */
$hash = SAFETY::password_hash($senha);
echo $hash.'<br>';

/* Verifico se a senha bate com a hash */
echo SAFETY::password_verify($senha, $hash);

    