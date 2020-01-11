<?php

class Company
{

    private $conn;

    function __construct()
    {
        $this->conn = DB::getInstance();
    }

    function getAllCompany()
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_empresas
            WHERE TRUE
                AND ativo = 1'
        ";

        return $this->conn->fetchAll($q);
    }

    function getInfoCompany($id)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_empresas
            WHERE TRUE
                AND ativo = 1'
                AND id = '{$id}'
        ";

        return $this->conn->fetchAll($q);
    }

    function getAllCompanyByUser($user){
        $q = "
            SELECT 
                id_empresa,
                tb_empresas.nome
            FROM 
                tbl_empresas_usuarios
                INNER JOIN tb_empresas on tb_empresas.id_empresa = tbl_empresas_usuarios.fk_empresa
            WHERE TRUE
                AND tb_empresas.ativo = 1
                AND tbl_empresas_usuarios.fk_usuario = '{$user}'
        ";

        return $this->conn->fetchAll($q);
    }
}
