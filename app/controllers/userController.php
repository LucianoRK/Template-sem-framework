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
        $company = new Company;
        $User    = new User;

        $dados['company'] = $company->getAllCompanyByUser(SESSION::getSession('id_usuario'));
        if (!$dados['company']) {
            $dados['company'] = $company->getInfoCompany(SESSION::getSession('fk_empresa'));
        }
        $dados['types_user'] = $User->getAllTypeUser();


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

        if (!is_numeric($empresa)) {
            array_push($erros, 'empresa');
        }
        if (!is_numeric($tipo_usuario)) {
            array_push($erros, 'tipo_usuario');
        }
        if (empty($nome) || strlen($nome) < 2) {
            array_push($erros, 'nome');
        }
        if (!is_numeric($cpf) || strlen($cpf) != 11) {
            array_push($erros, 'cpf');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($erros, 'email');
        }
        if (empty($data_nascimento)) {
            array_push($erros, 'data_nascimento');
        }
        if (strlen($login) < 5) {
            array_push($erros, 'login');
        }
        if (strlen($senha) < 7) {
            array_push($erros, 'senha');
        }
        if (strlen($senha_rep) < 7) {
            array_push($erros, 'senha_rep');
        }
        if ($senha != $senha_rep) {
            array_push($erros, 'senha');
            array_push($erros, 'senha');
        }
        
        if ($erros == 0 || $erros == null) {
            $user = new User;
            $user->recordNewUser(
                $empresa,
                $tipo_usuario,
                $nome,
                $cpf,
                $data_nascimento,
                $email,
                $login,
                SAFETY::password_hash($senha),
                3
            );
            
            //LOG::writeLog(SESSION::getSession('id_usuario'), 1, $log);
        }

        echo json_encode($erros);
    }

    function editUser()
    {
        $id_user       = VALIDATION::post('id_user');
        $user          = new User();
        $dados['user'] = $user->getInfoUser($id_user);
        $this->loadView('user/editUserLoad', $dados);
    }
    
    function deleteUser()
    {
        $user = new User;
        $user->deleteUser(VALIDATION::post('id_usuario_excluir'));
    }

    function reactivateUser()
    {
        $user = new User;
        $user->reactivateUser(VALIDATION::post('id_usuario_reativar'));
    }
}
