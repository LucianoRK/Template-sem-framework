<?php

class Cidade
{

    private $conn;

    function __construct()
    {
        $this->conn = DB::getInstance();
    }

    function getAllCitiesByState($fk_estado)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_cidades
            WHERE TRUE
                AND fk_estado = '{$fk_estado}'
                AND ativo = '1'
        ";

        return $this->conn->fetchAll($q);
    }
}
