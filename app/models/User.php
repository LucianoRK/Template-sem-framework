<?php

class User
{

    private $conn;

    public function __construct()
    {
        $this->conn = DB::getInstance();
    }

    public function getInfoUser($user)
    {
        $q = "
            SELECT 
                tb_usuarios.*,
                tb_empresas.id_empresa,
                tb_empresas.nome as nome_empresa,
                tb_tipos_usuario.id_tipo_usuario,
                tb_tipos_usuario.nome as nome_tipo_usuario
            FROM 
                tb_usuarios
                INNER JOIN tb_empresas ON tb_empresas.id_empresa = tb_usuarios.fk_empresa
                INNER JOIN tb_tipos_usuario ON tb_tipos_usuario.id_tipo_usuario = tb_usuarios.fk_tipo_usuario
            WHERE TRUE
                AND id_usuario = '{$user}'
        ";

        return $this->conn->fetch($q);
    }

    public function getAuthenticateUser($login)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_usuarios
            WHERE TRUE
                AND login = '{$login}'
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

    public function deleteUser($id_user)
    {
        $q = "
            UPDATE 
                tb_usuarios 
            SET
                ativo = 0
            WHERE 
                id_usuario = '{$id_user}'
        ";

        return $this->conn->execute($q);
    }

    public function reactivateUser($id_user)
    {
        $q = "
            UPDATE 
                tb_usuarios 
            SET
                ativo = 1
            WHERE 
                id_usuario = '{$id_user}'
        ";

        return $this->conn->execute($q);
    }

    public function recordNewUser(
        $fk_empresa,
        $fk_tipo_usuario,
        $nome,
        $cpf,
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
                    cpf, 
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
                '{$cpf}', 
                '{$data_nascimento}', 
                '{$email}', 
                '{$login}', 
                '{$senha}', 
                '{$quantidade_acesso}')
        ";

        $this->conn->execute($q);
    }


    public function updateUser($id_user, $nome, $cpf, $data_nascimento, $email, $senha)
    {
        $q = "
            UPDATE 
                tb_usuarios 
            SET
                nome            = '{$nome}',
                cpf             = '{$cpf}',
                data_nascimento = '{$data_nascimento}',
                email           = '{$email}', 
                senha           = '{$senha}' 
            WHERE 
                id_usuario = '{$id_user}'
        ";

        return $this->conn->execute($q);
    }

    function getUserAcesso($id_usuario, $fk_empresa)
    {
        $q = "
            SELECT 
                quantidade_acesso
            FROM 
                tb_usuarios
            WHERE TRUE
                AND id_usuario = '{$id_usuario}'
                AND fk_empresa = '{$fk_empresa}'
        ";

        return $this->conn->fetchAttr($q, "quantidade_acesso");
    }

    public function getUserByLogin($login, $id_user = false)
    {
        if(!$id_user){
            $id_user = 0;
        }
        $q = "
            SELECT 
                id_usuario
            FROM 
                tb_usuarios
            WHERE TRUE
                AND login = '{$login}'
                AND id_usuario != '{$id_user}'
        ";

        return $this->conn->fetch($q);
    }
    
    function updateAccess($id_user, $qtd_acesso)
    {
        $q = "
            UPDATE 
                tb_usuarios 
            SET
                quantidade_acesso = '{$qtd_acesso}'
            WHERE 
                id_usuario = '{$id_user}'
        ";

        return $this->conn->execute($q);
    }

    function removeAllAccess($id_user)
    {
        $q = "
            UPDATE 
                tb_usuarios 
            SET
                quantidade_acesso = 0
            WHERE 
                id_usuario = '{$id_user}'
        ";

        return $this->conn->execute($q);
    }

    function deleteCookie($id_user)
    {
        $q = "
            DELETE FROM 
                tb_login_cookies
            WHERE 
                fk_usuario = '{$id_user}'
        ";

        return $this->conn->execute($q);
    }

    function getPasswordUser($id_user)
    {
        $q = "
            SELECT 
                senha
            FROM 
                tb_usuarios
            WHERE TRUE
                AND id_usuario = '{$id_user}'
        ";

        return $this->conn->fetchAttr($q, "senha");
    }
}
