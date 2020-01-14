<?php

class loginController extends CONTROLLER
{

    public function index($dados = false)
    {
        if (!isset($dados) || empty($dados)) {
            $dados = array();
        }

        if (!SESSION::checkLoggedInUser()) {
            $this->loadView('login/login', $dados);
        } else {
            CONTROLLER::redirectPage("/home");
        }
    }

    public static function validateReCaptcha($recaptcha)
    {
        if (isset($recaptcha) && !empty($recaptcha)) {
            $chave_secreta      = "6LeEas8UAAAAAEoif3pDSc9eVnkBMcjBLYVsSw_o";
            $ip_logado          = $_SERVER['REMOTE_ADDR'];
            $retorno_google     = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$chave_secreta&response=$recaptcha&remoteip=$ip_logado"); 
            $retorno_convertido = json_decode($retorno_google, true);

            if ($retorno_convertido['success']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function logInto()
    {
        $dados          = array();
        $login_digitado = VALIDATION::post('login');
        $senha_digitado = VALIDATION::post('senha');
        $recaptcha      = VALIDATION::post('g-recaptcha-response');

        $retorno_recaptcha = self::validateReCaptcha($recaptcha);

        if ($retorno_recaptcha) {
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
        } else {
            $dados['error'] = "reCAPTCHA inválido!";
            $this->index($dados);
        }
    }
}
