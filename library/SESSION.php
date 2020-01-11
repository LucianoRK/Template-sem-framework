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
        if(isset($_SESSION[$session])){
            return $_SESSION[$session];
        }else{
            return false;
        }
    }
    
    static function checkLoggedInUser()
    {

        if (isset($_SESSION['id_usuario']) || !empty($_SESSION['id_usuario'])) {
            return true;
        } else {
            if (!isset($_GET['url']) || $_GET['url'] != "logar" && $_GET['url'] != "entrando/sistema") {
                CONTROLLER::redirectPage("/logar");
            }
        }
    }

    static function getUserId()
    {
        if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
            return $_SESSION['id_usuario'];
        } else {
            return false;
        }
    }
}
