<?php

class User
{

    private $conn;

    public function __construct()
    {
        $this->conn = DB::getInstance();
    }

    public function getAuthenticateUser($login)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_usuarios
            WHERE TRUE
                AND login = '{$login}' OR email = '{$login}'
                AND ativo = 1
        ";

        return $this->conn->fetch($q);
    }

    public function getAllUserCompany($company, $active)
    {
        $q = "
            SELECT 
                tb_usuarios.id_usuario,
                tb_usuarios.nome,
                tb_tipos_usuario.nome as tipo_nome,
                tb_usuarios.quantidade_acesso,
                tb_usuarios.fk_empresa
            FROM 
                tb_usuarios
                INNER JOIN tb_tipos_usuario on tb_tipos_usuario.id_tipo_usuario = tb_usuarios.fk_tipo_usuario
            WHERE TRUE
                AND tb_usuarios.fk_empresa = '{$company}'
                AND tb_usuarios.ativo      = '{$active}'
            ORDER BY
                tb_usuarios.nome
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

    public function getAllTypeUser()
    {
        $q = "
            SELECT 
                id_tipo_usuario,
                nome
            FROM 
                tb_tipos_usuario
            WHERE TRUE
                AND ativo = 1
                AND id_tipo_usuario != 1
        ";

        return $this->conn->fetchAll($q);
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

    public function recordNewUser(
        $fk_empresa,
        $fk_tipo_usuario,
        $nome,
        $data_nascimento,
        $email,
        $login,
        $senha,
        $quantidade_acesso
    ) {
        $q = "
            INSERT INTO 
                tb_usuarios (
                    fk_empresa, 
                    fk_tipo_usuario, 
                     nome, 
                    data_nascimento, 
                    email, 
                    login, 
                    senha, 
                    quantidade_acesso
                )
            VALUES (
                '{$fk_empresa}', 
                '{$fk_tipo_usuario}', 
                '{$nome}', 
                '{$data_nascimento}', 
                '{$email}', 
                '{$login}', 
                '{$senha}', 
                '{$quantidade_acesso}')
        ";

        $this->conn->execute($q);
    }
}
