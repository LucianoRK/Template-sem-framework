<?php

class userController extends CONTROLLER
{
    function index()
    {
        $company          = new Company;
        $dados['company'] = $company->getAllCompanyByUser(SESSION::getSession('id_usuario'));

        if (!$dados['company']) {
            $dados['company'] = $company->getInfoCompany(SESSION::getSession('fk_empresa'));
        }
        $this->loadTemplate('user/user', $dados);
    }

    function getListActiveUsers()
    {
        $user                 = new User;
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
        $user                      = new User;
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
        $user    = new User;
        $estado  = new Estado;

        $dados['company'] = $company->getAllCompanyByUser(SESSION::getSession('id_usuario'));

        if (!$dados['company']) {
            $dados['company'] = $company->getInfoCompany(SESSION::getSession('fk_empresa'));
        }
        $dados['types_user'] = $user->getAllTypeUser();
        $dados['estados']    = $estado->getAllStates();

        $this->loadView('user/newUserLoad', $dados);
    }

    function saveUser()
    {
        $erros      = array();
        $retorno    = array();
        $_POST      = ARRAYS::unserializeForm($_POST['dados']);
        $user       = new User;

        /* Tiro a mask da string */
        STRINGS::clearMask($_POST['cpf']);
        STRINGS::clearMask($_POST['cep']);

        /* Dados gerais */
        $id_user            = VALIDATION::post('id_usuario');
        $empresa            = VALIDATION::post('empresa');
        $tipo_usuario       = VALIDATION::post('tipo_usuario');

        /* Dados Pessoais */
        $nome               = VALIDATION::post('nome');
        $cpf                = VALIDATION::post('cpf');
        $email              = VALIDATION::post('email');
        $data_nascimento    = VALIDATION::post('data_nascimento');

        /* Dados residenciais */
        $cep                = VALIDATION::post('cep');
        $estado             = VALIDATION::post('estado');
        $cidade             = VALIDATION::post('cidade');
        $rua                = VALIDATION::post('rua');
        $numero_casa        = VALIDATION::post('numero_casa');

        /* Dados usuario */
        $login              = VALIDATION::post('login');
        $senha              = VALIDATION::post('senha');
        $senha_rep          = VALIDATION::post('senha_rep');

        if (!$id_user && !is_numeric($empresa)) {
            $erros['campos']    = "empresa";
            $erros['msgs']      = "Por favor, selecione a empresa";
            $retorno[]          = $erros;
        }

        if (!$id_user && !is_numeric($tipo_usuario)) {
            $erros['campos']    = "tipo_usuario";
            $erros['msgs']      = "Por favor, selecione tipo do usuário";
            $retorno[]          = $erros;
        }

        if (empty($nome) || strlen($nome) < 2) {
            $erros['campos']    = "nome";
            $erros['msgs']      = "Por favor, preencha o campo nome corretamente";
            $retorno[]          = $erros;
        }

        if (!VALIDATION::cpfvalidation($cpf)) {
            $erros['campos']    = "cpf";
            $erros['msgs']      = "Por favor, insira um cpf valido";
            $retorno[]          = $erros;
        }

        if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros['campos']    = "email";
            $erros['msgs']      = "Por favor, preencha o campo email corretamente";
            $retorno[]          = $erros;
        }

        if (empty($data_nascimento)) {
            $erros['campos']    = "data_nascimento";
            $erros['msgs']      = "Por favor, preencha o campo data de nascimento corretamente";
            $retorno[]          = $erros;
        }

        if ($estado && !is_numeric($estado)) {
            $erros['campos']    = "estado";
            $erros['msgs']      = "Por favor, selecione um estado";
            $retorno[]          = $erros;
        }

        if ($estado && !is_numeric($cidade)) {
            $erros['campos']    = "cidade";
            $erros['msgs']      = "Por favor, selecione uma cidade";
            $retorno[]          = $erros;
        }

        if (!$id_user && strlen($login) < 5) {
            $erros['campos']    = "login";
            $erros['msgs']      = "Por favor, o campo login deve conter ao menor seis caracter";
            $retorno[]          = $erros;
        }

        if (!$id_user) {
            $retorno = VALIDATION::validatePassword($retorno, $senha, $senha_rep);
        }

        if ($id_user) {
            $retorno = VALIDATION::validatePasswordWhenEditing($retorno, $senha, $senha_rep);
        }

        if(!$senha) {
            $senha = $user->getPasswordUser($id_user);
        } else {
            $senha = SAFETY::password_hash($senha);
        }

        if (empty($retorno)) {
            if ($id_user) {
                $user->updateUser($id_user, $nome, $cpf, $data_nascimento, $email,$senha);
            } else {
                $user->recordNewUser($empresa, $tipo_usuario, $nome, $cpf, $data_nascimento, $email, $login, $senha, 3);
            }
            //LOG::writeLog(SESSION::getSession('id_usuario'), 1, $log);
        }

        echo json_encode($retorno);
    }

    function editUser()
    {
        $id_user          = VALIDATION::post('id_user');
        $user             = new User();
        $estados          = new Estado();
        $dados['user']    = $user->getInfoUser($id_user);
        $dados['estados'] = $estados->getAllStates();

        $this->loadView('user/editUserLoad', $dados);
    }

    function deleteUser()
    {
        $id_user = VALIDATION::post('id_usuario_excluir');
        $user    = new User;

        $user->deleteUser($id_user);
        $user->removeAllAccess($id_user);
        $user->deleteCookie($id_user);
    }

    function reactivateUser()
    {
        $user = new User;
        $user->reactivateUser(VALIDATION::post('id_usuario_reativar'));
    }

    function showCities()
    {
        $id_estado = VALIDATION::post('id_estado');

        if ($id_estado) {
            $cidade           = new Cidade;
            $dados['cidades'] = $cidade->getAllCitiesByState($id_estado);

            if ($dados['cidades']) {
                $this->loadView('address/cities', $dados);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function moreAccess()
    {
        $id_user      = VALIDATION::post('id_usuario');
        $qtd_acesso   = VALIDATION::post('quantidade_acesso');

        if ($qtd_acesso <= 10 && $id_user) {
            $user = new User;
            $user->updateAccess($id_user, $qtd_acesso);

            return true;
        } else {
            return false;
        }
    }

    function removeAllAccess()
    {
        $id_user = VALIDATION::post('id_usuario');

        if ($id_user) {
            $user    = new User;
            $user->removeAllAccess($id_user);
            $user->deleteCookie($id_user);

            return true;
        } else {
            return false;
        }
    }
}
