<?php

class loginController extends CONTROLLER
{

    function index($dados = false)
    {
        if (!isset($dados) || empty($dados)) {
            $dados = array();
        }

        if(!SESSION::checkLoggedInUser()){
            $this->loadView('login/login', $dados);
        }else{
            CONTROLLER::redirectPage("/home");
        }
    }

    function logInto()
    {
        $dados = array();

        if (VALIDATION::post('login') && VALIDATION::post('senha')) {
            $login_digitado = VALIDATION::post('login');
            $senha_digitado = VALIDATION::post('senha');

            $user    = new User;
            $usuario = $user->getAuthenticateUser($login_digitado, $senha_digitado);

            if ($usuario) {
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['login']      = $usuario['login'];
                $_SESSION['nome']       = $usuario['nome'];
                $_SESSION['fk_empresa'] = $usuario['fk_empresa'];

                CONTROLLER::redirectPage("/home");
            } else {
                $dados = array(
                    "error" => "O login ou a senha que você inseriu não é válido",
                );
                $this->index($dados);
            }
        } else {
            $dados = array(
                "error" => "O login ou a senha que você inseriu não é válido",
            );
            $this->index($dados);
        }
    }
}
