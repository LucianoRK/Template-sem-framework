<?php

class loginController extends CONTROLLER
{

    public function index()
    {
        $dados = array();
        $this->loadView('login/login', $dados);
    }
}
