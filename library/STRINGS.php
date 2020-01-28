<?php

class STRINGS
{

    static function limpar($str)
    {
        $striped_str = addslashes(strip_tags($str));
        $striped_str = self::removeWhitespace($striped_str);

        return $striped_str;
    }

    static function properCase($string)
    {
        $ignorar = array('do', 'dos', 'da', 'das', 'de');
        $array   = explode(' ', strtolower($string));
        $out     = '';
        foreach ($array as $ar) {
            $out .= (in_array($ar, $ignorar) ? $ar : ucfirst($ar)) . ' ';
        }

        return trim($out);
    }

    static function removeWhitespace($string)
    {
        return preg_replace('/\s{2,}/', ' ', trim($string));
    }

    static function formatCPF($cpf)
    {
        if ($cpf && strlen($cpf) == 11) {
            $mask = "%s%s%s.%s%s%s.%s%s%s-%s%s";

            return vsprintf($mask, str_split($cpf));
        }
    }

    static function isFoneValid($phone)
    {
        $pattern = "/^(?=.*[0-9])[- +()0-9]+$/";
        $result  = preg_match($pattern, $phone);
        
        return $result;
    }

    static function isEmailValid($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    static function isNameValid($nome)
    {
        if (preg_match('/^[a-z .\-\']+$/i', $nome)) {
            return true;
        } else {
            return false;
        }
    }

    static function isUserValid($senha)
    {
        if (preg_match("/\\s/", $senha)) {
            return false;
        } else {
            return true;
        }
    }

    static function isPasswordValid($senha)
    {
        if (preg_match("/\\s/", $senha)) {
            return false;
        } else {
            return true;
        }
    }

    static function readableRegex($regex)
    {
        $regex = str_replace("^", "", $regex);
        $regex = str_replace("\/", "/", $regex);
        $regex = str_replace("?$", "", $regex);
        $regex = str_replace("(\d+)", "{int}", $regex);
        $regex = str_replace("([a-zA-Z\-]+)", "{string}", $regex);

        return $regex;
    }

    static function genPassword($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = strlen($chars);
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index  = rand(0, $count - 1);
            $result .= substr($chars, $index, 1);
        }

        return $result;
    }

    static function writeLog($text)
    {
        $fp = fopen('log.txt', 'w');
        fwrite($fp, $text);
        fclose($fp);
    }

    static function regexToUrl($regex)
    {
        $regex = str_replace("^", "", $regex);
        $regex = str_replace("\/", "/", $regex);
        $regex = str_replace("?$", "", $regex);
        $regex = str_replace("(\d+)", "{int}", $regex);
        $regex = str_replace("([a-zA-Z\-]+)", "{string}", $regex);
        
        return $regex;
    }

    static function clearMask(& $string)
    {
        $string = str_replace(".", "", $string);
        $string = str_replace("-", "", $string);
        $string = str_replace("_", "", $string);
        $string = str_replace("/", "", $string);

        return $string;
    }
}
