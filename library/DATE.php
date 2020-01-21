<?php

class DATE
{
    static function mysqlToDate($date)
    {
        if($date == '0000-00-00'){
            return '';
        }else{
            return date("d/m/Y", strtotime($date));
        }
       
    }

    static function dateToMysql($date)
    {
        $explode = explode("/", $date);
        if (count($explode) === 3) {
            if (is_numeric($explode[0]) && is_numeric($explode[1]) && is_numeric($explode[2])) {
                if (checkdate($explode[1], $explode[0], $explode[2])) {
                    return date('Y-m-d', strtotime($explode[2] . "-" . $explode[1] . "-" . $explode[0]));
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static function timestampToUtc($dt)
    {
        $date = new DateTime($dt, new DateTimeZone('America/Sao_Paulo'));
        $data = $date->format("Y-m-d\TH:i:sP");

        return $data;
    }
}
