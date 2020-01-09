<?php

class userController extends CONTROLLER
{
    public function index($dados = false)
    {
        if (!isset($dados) || empty($dados)) {
            $dados = array();
        }
        
        $user = new User;
        $dados['user'] = $user->getAllUserCompany(1);
        $this->loadTemplate('user/user', $dados);
    }
}
