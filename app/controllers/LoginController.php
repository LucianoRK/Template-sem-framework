<?php

class loginController extends CONTROLLER
{

    function index()
    {
        $dados = array();
        $this->loadViewInTemplate('login/login', $dados);
    }

    function logInto()
    {
        $dados = array();

        $url = '/'.$_GET['url'];
       print_r($url);
        die();

        if (VALIDATION::post('email') && VALIDATION::post('senha')) {
            $email_digitado = VALIDATION::post('email');
            $senha_digitado = VALIDATION::post('senha');

            $user = new User;
            $usuario = $user->getUser($email_digitado, $senha_digitado);

            if ($usuario) {
                $_SESSION['id_user'] = $usuario['id_usuario'];
                $_SESSION['nome']    = $usuario['nome'];
                $_SESSION['email']   = $usuario['email'];

                header('Location: /raiz');
            } else {
                $dados = array(
                    "error" => "O endereço de email ou a senha que você inseriu não é válido",
                );
                $this->loadViewInTemplate('login/login', $dados);
            }
        } else {
            die("a");

            $dados = array(
                "error" => "O endereço de email ou a senha que você inseriu não é válido",
            );
            $this->loadViewInTemplate('login/login', $dados);
        }
    }
}
