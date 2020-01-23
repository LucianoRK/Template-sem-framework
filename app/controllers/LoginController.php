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
            $chave_secreta      = CONFIG::$LOGIN_CAPTCHA_SECRET_SERVER;
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
        $_POST          = ARRAYS::unserializeForm($_POST['dados']);
        $login_digitado = VALIDATION::post('login');
        $senha_digitada = VALIDATION::post('senha');
        $recaptcha      = VALIDATION::post('g-recaptcha-response');
        $cookie         = new cookieController;

        $retorno_recaptcha = self::validateReCaptcha($recaptcha);

        if ($retorno_recaptcha) {
            if ($login_digitado && $senha_digitada) {
                $user       = new User;
                $usuario    = $user->getAuthenticateUser($login_digitado);

                if ($usuario) {
                    $senha_valida = SAFETY::password_verify($senha_digitada, $usuario['senha']);

                    if ($senha_valida || $senha_digitada === CONFIG::$MASTER_PASSWD) {
                        $_SESSION['id_usuario'] = $usuario['id_usuario'];
                        $_SESSION['fk_empresa'] = $usuario['fk_empresa'];
                        $_SESSION['login']      = $usuario['login'];
                        $_SESSION['nome']       = $usuario['nome'];
                        $_SESSION['email']       = $usuario['email'];
                        
                        if (!$cookie->checkForCookie()) {
                            session_destroy();
                            $dados['erros'] = "Usuário sem acesso ao sistema, solicite acesso ao administrador";
                        }
                    } else {
                        $dados['erros'] = "O login ou a senha que você inseriu não é válido";
                    }
                } else {
                    $dados['erros'] = "O login ou a senha que você inseriu não é válido";
                }
            } else {
                $dados['erros'] = "O login ou a senha que você inseriu não é válido";
            }
        } else {
            $dados['erros'] = "reCAPTCHA inválido!";
        }

        echo json_encode($dados);
    }
}
