<?php

class SESSION
{

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
