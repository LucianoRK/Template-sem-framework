<?php

class Core
{
    public function run()
    {
        $url = '/';
        $params = [];

        if (isset($_GET['url'])) {
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

        $existeController = "app/controllers/".$currentController.".php";

        if (file_exists($existeController)) {
            $c = new $currentController();
            call_user_func_array(array($c, $currentAction), $params);
        } else {
            die("Pagina não encontrada");
        }
    }
}
