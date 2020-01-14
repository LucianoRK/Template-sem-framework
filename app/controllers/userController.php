<?php

class userController extends CONTROLLER
{
    function index()
    {
        $company = new Company;
        $dados['company'] = $company->getAllCompanyByUser(SESSION::getSession('id_usuario'));
        if (!$dados['company']) {
            $dados['company'] = $company->getInfoCompany(SESSION::getSession('fk_empresa'));
        }
        $this->loadTemplate('user/user', $dados);
    }

    function getListActiveUsers()
    {
        $user    = new User;
        $dados['user_ativos'] = $user->getAllUserCompany(VALIDATION::post('company'), 1);

        if ($dados['user_ativos']) {
            $company = new Company;
            $dados['nome_empresa'] = $company->getNameCompany(VALIDATION::post('company'));
            $dados['count'] = 0;
        } else {
            $dados['user_ativos'] = false;
            $dados['error'] = MSG::nenhumaInformacao();
        }
        $this->loadView('user/activeUserLoad', $dados);
    }

    function getListDisableUsers()
    {
        $user = new User;
        $dados['user_desativados'] = $user->getAllUserCompany(VALIDATION::post('company'), 0);
        if ($dados['user_desativados']) {
            $company = new Company;
            $dados['nome_empresa'] = $company->getNameCompany(VALIDATION::post('company'));
            $dados['count'] = 0;
        } else {
            $dados['user_desativados'] = false;
            $dados['error'] = MSG::nenhumaInformacao();
        }
        $this->loadView('user/disabledUserLoad', $dados);
    }

    function newUser()
    {
        $dados = array();
        $this->loadView('user/newUserLoad', $dados);
    }

    function saveUser()
    {
        /*Dados gerais */
        $empresa = VALIDATION::post('empresa');
        $tipo_usuario = VALIDATION::post('tipo_usuario');

        /*Dados Pessoais */
        $nome = VALIDATION::post('nome');
        $cpf = VALIDATION::post('cpf');
        $email = VALIDATION::post('email');
        $data_nascimento = VALIDATION::post('data_nascimento');

        /*Dados residenciais */
        $cidade = VALIDATION::post('cidade');
        $estado = VALIDATION::post('estado');
        $rua = VALIDATION::post('rua');
        $numero_casa = VALIDATION::post('numero_casa');

        /*Dados usuario */
        $login = VALIDATION::post('login');
        $senha = VALIDATION::post('senha');
        $senha_rep = VALIDATION::post('senha_rep');

       echo $login;
    }

    function editUser()
    {
        $dados = array();
        $this->loadView('user/editUserLoad', $dados);
    }
}
