<?php

class userController extends CONTROLLER
{
    public function index()
    {
        $dados = array();
        $this->loadTemplate('user/user', $dados);
    }
}