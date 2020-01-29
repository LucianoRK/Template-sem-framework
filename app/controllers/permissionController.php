<?php

class permissionController extends CONTROLLER
{
    public function index()
    {
        $company = new Company;
        $dados['company'] = $company->getAllCompanyByUser(SESSION::getSession('id_usuario'));

        if (!$dados['company']) {
            $dados['company'] = $company->getInfoCompany(SESSION::getSession('fk_empresa'));
        }
        
        $this->loadTemplate('permission/permission', $dados);
    }

    public function selectUsers()
    {
        $user = new User;
        $dados['users'] = $user->getAllUserCompany(VALIDATION::post('company'), 1);
        
        $this->loadView('permission/selectUsers', $dados);
    }

    public function listPermissionByUser()
    {
        $user = new User;
        $dados['user'] = $user->getInfoUser(VALIDATION::post('user'));

        $this->loadView('permission/listByUser', $dados);
    }
}
