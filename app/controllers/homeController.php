<?php

class homeController extends CONTROLLER
{

    function index()
    {
        $dados = array();
        $this->loadTemplate('home/home', $dados);
    }

    function exit_system()
    {
        session_destroy();
        CONTROLLER::redirectPage("/logar");
    }
}