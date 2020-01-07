<?php

class DATE
{
    public static function mysqlToDate($date)
    {
        return date("d/m/Y", strtotime($date));
    }

    public static function dateToMysql($date)
    {
        $explode = explode("/", $date);
        if (count($explode) === 3) {
            if (checkdate($explode[1], $explode[0], $explode[2])) {
                return date('Y-m-d',
                    strtotime($explode[2]."-".$explode[1]."-".$explode[0]));
            } else {
                APP::returnResponse(false, "A data selecionada é inválida");
            }
        } else {
            APP::returnResponse(false, "Formato da data inválido");
        }
    }

    public static function timestampToUtc($dt)
    {
        $date = new DateTime($dt, new DateTimeZone('America/Sao_Paulo'));
        $data = $date->format("Y-m-d\TH:i:sP");
        return $data;
    }
}