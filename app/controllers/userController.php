<?php

class userController extends CONTROLLER
{
    public function index()
    {
        $dados = array();
        $this->loadView('user/user', $dados);
    }
}