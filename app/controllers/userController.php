<?php

class userController extends CONTROLLER
{
    public function index()
    {
        $company = new Company;
        $dados['company'] = $company->getAllCompanyByUser(SESSION::getSession('id_usuario'));
        if (!$dados['company']) {
            $dados['company'] = $company->getInfoCompany(SESSION::getSession('fk_empresa'));
        }
        $this->loadTemplate('user/user', $dados);
    }

    public function getListActiveUsers()
    {
        $user = new User;
        $dados['user_ativos'] = $user->getAllUserCompany(VALIDATION::post('company'), 1);
        $this->loadView('user/activeUserLoad', $dados);
    }

    public function getListDisableUsers()
    {
        $user = new User;
        $dados['user_ativos'] = $user->getAllUserCompany(VALIDATION::post('company'), 0);
        $this->loadView('user/disabledUserLoad', $dados);
    }
}
