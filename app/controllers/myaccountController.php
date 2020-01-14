<?php

class myaccountController extends controller
{

    public function index($dados = false)
    {
        if (!isset($dados) || empty($dados)) {
            $dados = array();
        }

        $id_usuario = SESSION::getUserId();

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
                $dados['error'] = "Não foi encontrado nenhuma informação deste usuáro";
                $this->loadTemplate('myaccount/myaccount', $dados);
            }
        } else {
            $dados['nome']          = "";
            $dados['email']         = "";
            $dados['login']         = "";
            $dados['data_registro'] = "";
            $dados['error'] = "Não foi encontrado o id do usuário na sessão";
            $this->loadTemplate('myaccount/myaccount', $dados);
        }
    }

    public function changeMyPassword()
    {
        $dados          = array();
        $nova_senha     = VALIDATION::post('nova_senha');
        $nova_senha_rep = VALIDATION::post('nova_senha_rep');

        if ($nova_senha && $nova_senha_rep) {
            if ($nova_senha == $nova_senha_rep) {
                $id_usuario = SESSION::getUserId();

                if ($id_usuario) {
                    $nova_senha_has = SAFETY::password_hash($nova_senha);
                    $user           = new User;
                    $user->changeMyPassword($id_usuario, $nova_senha_has);

                    $dados['success']  = "A senha foi alterado";
                    $this->index($dados);
                } else {
                    $dados['error']  = "Não foi encontrado o id do usuário na sessão";
                    $this->index($dados);
                }
            } else {
                $dados['error']  = "As duas senhas não conferem";
                $this->index($dados);
            }
        } else {
            $dados['error']  = "Nenhuma senha foi digitada, os dois campos são obrigatórios";
            $this->index($dados);
        }
    }
}
