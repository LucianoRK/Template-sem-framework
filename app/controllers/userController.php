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
        if($dados['user_ativos']){
            $dados['count'] = 0;
        }else{
            $dados['user_ativos'] = false;
            $dados['error'] = MSG::nenhumaInformacao();
        }
        $this->loadView('user/activeUserLoad', $dados);
    }

    public function getListDisableUsers()
    {
        $user = new User;
        $dados['user_desativados'] = $user->getAllUserCompany(VALIDATION::post('company'), 0);
        if($dados['user_desativados']){
            $dados['count'] = 0;
        }else{
            $dados['user_desativados'] = false;
            $dados['error'] = MSG::nenhumaInformacao();
        }
        $this->loadView('user/disabledUserLoad', $dados);
    }
}
