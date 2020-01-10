<?php

class CONTROLLER
{

    static function loadView($viewName, $dados = array())
    {
        // PEGA AS CHAVES DO ARRAY E TRANSFORMA EM VARIAVEL ONDE O VALOR É O VALOR DELA
        extract($dados);
        require 'app/views/' . $viewName . '.php';
    }

    static function loadTemplate($viewName, $dados = array())
    {
        include 'public/matriz/topbar.php';
        //include 'public/matriz/footer.php';
    }

    static function loadViewInTemplate($viewName, $dados = array())
    {
        extract($dados);
        require 'app/views/' . $viewName . '.php';
    }

    static function redirectPage($page)
    {
        $base_url = CONFIG::getBaseUrl();
        return header("Location: $base_url"."$page");
    }
}
