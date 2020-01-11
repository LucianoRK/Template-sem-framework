<?php

class homeController extends CONTROLLER
{

    public function index()
    {
        $dados = array();
        $this->loadTemplate('home/home', $dados);
    }

    public function exit_system()
    {
        session_destroy();
        CONTROLLER::redirectPage("/logar");
    }
}