<?php

class Permission
{

    private $conn;

    public function __construct()
    {
        $this->conn = DB::getInstance();
    }

    public function getAllpermission()
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_permissoes
            WHERE TRUE
                AND ativo = 1
        ";

        return $this->conn->fetchAll($q);
    }

    public function getpermissionForUser($user)
    {
        $q = "
            SELECT 
                *
            FROM 
                tbl_usuarios_permissoes
            WHERE TRUE
                AND fk_usuario = '{$user}'
        ";

        return $this->conn->fetchAll($q);
    }

    public function hasPermission($permission)
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

        return $this->conn->fetchAll($q);
    }

    public function insertPermission($name)
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

    public function insertPermissionForUser($user, $permission)
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
