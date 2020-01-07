<?php

class CONTROLLER
{

    static function loadView($viewName, $dados = array())
    {
        // PEGA AS CHAVES DO ARRAY E TRANSFORMA EM VARIAVEL ONDE O VALOR É O VALOR DELA
        extract($dados);
        require 'app/views/' . $viewName . '.php';
    }

    
}
