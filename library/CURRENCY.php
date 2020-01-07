<?php

class CURRENCY
{
    static function currencyBrForMysql($valor)
    {
        $valor2 = str_replace('.', '', $valor);
        
        return str_replace(',', '.', $valor2);
    }

    static function currencyMysqlForBr($valor)
    {
        return number_format($valor, 2, ',', '.');
    }

    static function converteCurrencyForBigint($valor)
    {
        $valor_final = $valor * 100;
        $valor2 = str_replace('.', '', $valor_final);

        return str_replace(',', '', $valor2);
    }

    static function reaisToCentavos($reais)
    {
        return self::currencyBrForMysql($reais) * 100;
    }

    static function intToMysql($valor)
    {
        $valor2 = CURRENCY::currencyMysqlForBr($valor);

        return CURRENCY::currencyBrForMysql($valor2);
    }
}
