<?php

class myaccountController extends controller
{

    public function index($dados = false)
    {
        if (!isset($dados) || empty($dados)) {
            $dados = array();
        }

        $id_usuario = SESSION::getSession("id_usuario");

        if ($id_usuario) {
            $user    = new User;
            $usuario = $user->getLoggedUserData($id_usuario);

            if ($usuario) {
                $dados['nome']          = $usuario['nome'];
                $dados['email']         = $usuario['email'];
                $dados['login']         = $usuario['login'];
                $dados['data_registro'] = DATE::mysqlToDate($usuario['data_registro']);

                $this->loadTemplate('myaccount/myaccount', $dados);
            } else {
                $dados['nome']          = "";
                $dados['email']         = "";
                $dados['login']         = "";
                $dados['data_registro'] = "";
                $dados['error']         = "Não foi encontrado nenhuma informação deste usuáro";

                $this->loadTemplate('myaccount/myaccount', $dados);
            }
        } else {
            $dados['nome']          = "";
            $dados['email']         = "";
            $dados['login']         = "";
            $dados['data_registro'] = "";
            $dados['error']         = "Não foi encontrado o id do usuário na sessão";

            $this->loadTemplate('myaccount/myaccount', $dados);
        }
    }

    public function changeMyPassword()
    {
        $erros          = array();
        $retorno        = array();
        $_POST          = ARRAYS::unserializeForm($_POST['dados']);
        $nova_senha     = VALIDATION::post('senha');
        $nova_senha_rep = VALIDATION::post('senha_rep');
        $retorno        = VALIDATION::validatePassword($retorno, $nova_senha, $nova_senha_rep);

        if (empty($retorno)) {
            $user           = new User;
            $nova_senha_has = SAFETY::password_hash($nova_senha);
            $user->changeMyPassword(SESSION::getSession("id_usuario"), $nova_senha_has);
        }

        echo json_encode($retorno);
    }
}
