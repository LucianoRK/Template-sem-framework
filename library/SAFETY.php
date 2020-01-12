<?php

class SAFETY
{
    /** Gera a criptografia */
    static function password_hash($senha)
    {
        if ($senha) {
            return password_hash($senha, PASSWORD_DEFAULT);
        } else {
            return null;
        }
    }

    /** Verifica  a criptografia */
    static function password_verify($senha, $hash)
    {
        if ($senha) {
            return password_verify($senha, $hash);
        } else {
            return false;
        }
    }
}
