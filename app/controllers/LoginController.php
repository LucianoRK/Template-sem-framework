<?php

class loginController extends CONTROLLER
{

    function index()
    {
        $dados = array();
        $this->loadView('login/login', $dados);
    }
}
