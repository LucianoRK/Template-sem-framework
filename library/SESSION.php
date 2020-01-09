<?php

class SESSION
{

    static function checkLoggedInUser()
    {
        if(isset($_SESSION['id_user']) || !empty($_SESSION['id_user'])) {
            return true;
        } else {
            CONTROLLER::redirectPage("/logar");
        }
    }
}
