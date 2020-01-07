<?php

class PERMISSION
{

    private $conn;

    function __construct()
    {
        $this->conn = DB::get_instance();
    }

    function getAllpermission()
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_permissoes
            WHERE TRUE
                AND ativo = 1
        ";

        return $this->conn->fetch_all($q);
    }

    function getpermissionForUser($user)
    {
        $q = "
            SELECT 
                *
            FROM 
                tbl_usuarios_permissoes
            WHERE TRUE
                AND fk_usuario = '{$user}'
        ";

        return $this->conn->fetch_all($q);
    }

    function hasPermission($permission)
    {
        $user = 0; /* Preciso trazer o usuario da sessão */

        $q = "
            SELECT 
                *
            FROM 
                tbl_usuarios_permissoes
            WHERE TRUE
                AND fk_usuario   = '{$user}'
                AND fk_permissao = '{$permission}'
        ";

        return $this->conn->fetch_all($q);
    }

    function insertPermission($name)
    {
        $q = "
            INSERT INTO 
                tb_permissoes
                    (nome)
            VALUES(
                '{$name}'
            )
        ";

        return $this->conn->execute($q);
    }

    function insertPermissionForUser($user, $permission)
    {
        $q = "
            INSERT INTO 
                tbl_usuarios_permissoes
                    (fk_usuario, fk_permissao)
            VALUES(
                '{$user}',
                '{$permission}'
            )
        ";

        return $this->conn->execute($q);
    }
}
