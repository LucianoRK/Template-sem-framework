<?php

class Log
{

    private $conn;

    public function __construct()
    {
        $this->conn = DB::getInstance();
    }

    public function getLogByUser($user)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_logs
            WHERE TRUE
                AND fk_usuario = '{$user}'
        ";

        return $this->conn->fetchAll($q);
    }

    public function writeLog($string)
    {
        $fp = fopen('log.txt', 'a');
        fwrite($fp, "\n\n");
        fwrite($fp, date("Y/m/d g:i:s") . " -> " . trim($string) . "\n");
        fclose($fp);
    }

    public function writeRouteLog($fk_empresa, $fk_usuario, $route)
    {
        $q = "
            INSERT INTO tb_log_rotas
                (fk_empresa, fk_usuario, rota)
            VALUES(
                '{$fk_empresa}',
                '{$fk_usuario}',
                '{$route}'
            )
        ";

        return $this->conn->execute($q);
    }
}
