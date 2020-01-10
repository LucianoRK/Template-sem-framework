<?php

class User
{

    private $conn;

    function __construct()
    {
        $this->conn = DB::get_instance();
    }

    function getAuthenticateUser($login, $senha)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_usuarios
            WHERE TRUE
                AND login = '$login'
                AND senha = '$senha'
                AND ativo = 1
        ";

        return $this->conn->fetch($q);
    }

    function getAllUserCompany($company)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_usuarios
            WHERE TRUE
                AND fk_empresa = '{$company}'
        ";

        return $this->conn->fetch_all($q);
    }
}
