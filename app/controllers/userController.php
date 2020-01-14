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
        $erros = array();

        /*Dados gerais */
        $empresa      = VALIDATION::post('empresa');
        $tipo_usuario = VALIDATION::post('tipo_usuario');

        /*Dados Pessoais */
        $nome            = VALIDATION::post('nome');
        $cpf             = VALIDATION::post('cpf');
        $email           = VALIDATION::post('email');
        $data_nascimento = VALIDATION::post('data_nascimento');

        /*Dados residenciais */
        $cidade      = VALIDATION::post('cidade');
        $estado      = VALIDATION::post('estado');
        $rua         = VALIDATION::post('rua');
        $numero_casa = VALIDATION::post('numero_casa');

        /*Dados usuario */
        $login     = VALIDATION::post('login');
        $senha     = VALIDATION::post('senha');
        $senha_rep = VALIDATION::post('senha_rep');

        if(!is_numeric($empresa)){
            array_push($erros, 'empresa');
        }
        if(!is_numeric($tipo_usuario)){
            array_push($erros, 'tipo_usuario');
        }
        if(!empty($nome) || strlen ($nome) < 2){
            array_push($erros, 'nome');
        }
        if(!is_numeric($cpf) || strlen ($cpf) != 11){
            array_push($erros, 'cpf');
        }
        if(!empty($email)){ // complementar
            array_push($erros, 'email');
        }
        if(!empty($data_nascimento)){ // complementar
            array_push($erros, 'data_nascimento');
        }

        if(strlen ($login) < 5){//complementar
            array_push($erros, 'login');
        }
        if(strlen ($senha) < 5){//complementar
            array_push($erros, 'senha');
        }
        if(strlen ($senha_rep) < 5){//complementar
            array_push($erros, 'senha_rep');
        }
        
        echo json_encode($erros);

    }

    function editUser()
    {
        $dados = array();
        $this->loadView('user/editUserLoad', $dados);
    }
}
