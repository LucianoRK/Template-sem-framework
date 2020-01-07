<?php

class Log
{

    private $conn;

    function __construct()
    {
        $this->conn = DB::get_instance();
    }

    function getLogForUser($user)
    {
        $q = "
            SELECT 
                *
            FROM 
                tb_logs
            WHERE TRUE
                AND fk_usuario = '{$user}'
        ";

        return $this->conn->fetch_all($q);
    }

    function writeLog($string)
    {
        $fp = fopen('log.txt', 'a');
        fwrite($fp, "\n\n");
        fwrite($fp, date("Y/m/d g:i:s") . " -> " . trim($string) . "\n");
        fclose($fp);
    }
}
