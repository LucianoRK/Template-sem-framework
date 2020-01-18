<?php

class Cookie
{
    private $conn;

    function __construct()
    {
        $this->conn = DB::getInstance();
    }
    
    function createCookie($fk_usuario, $fk_empresa)
    {
        $q = "
            INSERT INTO tb_login_cookies
                (fk_usuario, fk_empresa)
            VALUES(
                '{$fk_usuario}',
                '{$fk_empresa}'
            )
        ";

        $this->conn->execute($q);
        return $this->conn->lastId();
    }

    function getUserCookie($fk_usuario, $fk_empresa)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_login_cookies
            WHERE TRUE
                AND fk_usuario = '{$fk_usuario}'
                AND fk_empresa = '{$fk_empresa}'
                AND ativo      = '1'
        ";

        return $this->conn->fetchAll($q);
    }

    function getCookieAmount($fk_usuario, $fk_empresa)
    {
        $q = "
            SELECT 
                id_cookie
            FROM 
                tb_login_cookies
            WHERE TRUE
                AND fk_usuario = '{$fk_usuario}'
                AND fk_empresa = '{$fk_empresa}'
                AND ativo      = '1'
        ";

        return $this->conn->rowCount($q);
    }
}
