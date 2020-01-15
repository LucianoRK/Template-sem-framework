<?php

class SESSION
{

    static function setSession($session, $valor)
    {
        if($session){
            $_SESSION[$session] = $valor;
            return true;
        }else{
            return false;
        }
    }

    static function getSession($session)
    {
        if(isset($_SESSION[$session]) && !empty($_SESSION[$session])) {
            return $_SESSION[$session];
        }else{
            return false;
        }
    }
    
    static function checkLoggedInUser()
    {

        if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && isset($_SESSION['fk_empresa']) && !empty($_SESSION['fk_empresa'])) {
            return true;
        } else {
            if (!isset($_GET['url']) || $_GET['url'] != "logar" && $_GET['url'] != "entrando/sistema") {
                CONTROLLER::redirectPage("/logar");
            }
        }
    }
}
