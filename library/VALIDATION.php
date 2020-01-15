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
}
