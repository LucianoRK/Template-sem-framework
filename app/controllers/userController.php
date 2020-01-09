<?php

class userController extends CONTROLLER
{
    public function index($dados = false)
    {
        if (!isset($dados) || empty($dados)) {
            $dados = array();
        }
        $dados = new User;
        $this->loadTemplate('user/user', $dados->getAllUserCompany(1));
    }

}