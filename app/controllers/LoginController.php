<?php

class loginController extends CONTROLLER
{

    public function index($dados = false)
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

    public function logInto()
    {
        $dados          = array();
        $login_digitado = VALIDATION::post('login');
        $senha_digitado = VALIDATION::post('senha');

        if ($login_digitado && $senha_digitado) {
            $user    = new User;
            $usuario = $user->getAuthenticateUser($login_digitado, $senha_digitado);

            if ($usuario) {
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['login']      = $usuario['login'];
                $_SESSION['nome']       = $usuario['nome'];
                $_SESSION['fk_empresa'] = $usuario['fk_empresa'];

                CONTROLLER::redirectPage("/home");
            } else {
                $dados['error'] = "O login ou a senha que você inseriu não é válido";
                $this->index($dados);
            }
        } else {
            $dados['error'] = "O login ou a senha que você inseriu não é válido";
            $this->index($dados);
        }
    }
}
