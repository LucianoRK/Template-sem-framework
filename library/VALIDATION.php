<?php

class VALIDATION
{

    static function post($name)
    {
        if (isset($_POST["$name"]) && !empty($_POST["$name"])) {
            return STRINGS::limpar($_POST["$name"]);
        } else {
            return false;
        }
    }

    static function get($post)
    {
        if (isset($_POST["$post"]) && !empty($_POST["$post"])) {
            return STRINGS::limpar($_POST["$post"]);
        } else {
            return false;
        }
    }

    static function EmptyAndNumeric($dado)
    {
        if (is_numeric($dado) && !empty($dado)) {
            return true;
        } else {
            return false;
        }
    }

    static function cpfvalidation($cpf) {

        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        if (strlen($cpf) != 11) {
            return false;
        }
    
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    /** Verifica se existe numeros e letras na string */
    static function lettersNumber($string){
        if(preg_match("/[a-z]+/i", $string) && preg_match("/[0-9]+/", $string)){
            return true;
        }else{
           return false;
        }
    }
}
