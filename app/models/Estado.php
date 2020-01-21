<?php

class Estado
{

    private $conn;

    function __construct()
    {
        $this->conn = DB::getInstance();
    }

    function getAllStates()
    {
        $q = "
        SELECT 
            *
        FROM 
            tb_estados
        WHERE TRUE
            AND ativo = '1'
    ";

    return $this->conn->fetchAll($q);
    }
}
