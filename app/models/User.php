<?php

class User
{

    private $conn;

    public function __construct()
    {
        $this->conn = DB::getInstance();
    }

    public function getAuthenticateUser($login, $senha)
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

    public function getAllUserCompany($company)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_usuarios
            WHERE TRUE
                AND fk_empresa = '{$company}'
        ";

        return $this->conn->fetchAll($q);
    }

    public function getLoggedUserData($id_usuario)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_usuarios
            WHERE TRUE
                AND id_usuario = '{$id_usuario}'
        ";

        return $this->conn->fetch($q);
    }

    public function changeMyPassword($id_usuario, $nova_senha)
    {
        $q = "
            UPDATE 
                tb_usuarios 
            SET
                senha = '{$nova_senha}'
            WHERE 
                id_usuario = '{$id_usuario}'
        ";

        return $this->conn->execute($q);
    }
}
