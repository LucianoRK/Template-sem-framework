<?php

class MOEDA
{

    static function moedaBrParaMysql($valor)
    {
        $valor2 = str_replace('.', '', $valor);
        return str_replace(',', '.', $valor2);
    }

    static function moedaMysqlParaBr($valor)
    {
        return number_format($valor, 2, ',', '.');
    }

    static function converteMoedaParaBigint($valor)
    {
        $valor_final = $valor * 100;
        $valor2 = str_replace('.', '', $valor_final);
        return str_replace(',', '', $valor2);
    }

    static function reaisToCentavos($reais)
    {
        return self::moedaBrParaMysql($reais) * 100;
    }

    static function int_to_mysql($valor)
    {
        $valor2 = MOEDA::moedaMysqlParaBr($valor);
        return MOEDA::moedaBrParaMysql($valor2);
    }
}
