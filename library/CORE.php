<?php

class CORE
{
    static function run()
    {
        $url = '/';
        $params = array();

        if (isset($_GET['url'])) {
            if( substr($_GET['url'], -1) == "/"){
                require 'notfound.php';
            }

            $url .= $_GET['url'];
        }

        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0] . 'Controller';
            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if (count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction     = 'index';
        }

        $existeController = "app/controllers/" . $currentController . ".php";


        if (file_exists($existeController)) {
            $c = new $currentController();

            if (method_exists($currentController, $currentAction)) {
                call_user_func_array(array($c, $currentAction), $params);
            } else {
                require 'notfound.php';
            }
        } else {
            require 'notfound.php';
        }
    }
}
