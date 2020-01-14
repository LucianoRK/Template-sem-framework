<?php

class VALIDATION
{

    static function post($name)
    {
        if (isset($_POST["$name"]) && !empty($_POST["$name"])) {
            return trim($_POST["$name"]);
        } else {
            return false;
        }
    }

    static function get($post)
    {
        if (isset($_POST["$post"]) && !empty($_POST["$post"])) {
            return trim($_POST["$post"]);
        } else {
            return false;
        }
    }
}
