<?php

class CategoriasChamados
{

    private $conn;

    function __construct()
    {
        $this->conn = DB::getInstance();
    }

    function getAllCategories()
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_categorias_chamados
            WHERE TRUE
                AND ativo = '1'
            ORDER BY
                nome ASC
        ";

        return $this->conn->fetchAll($q);
    }
}
