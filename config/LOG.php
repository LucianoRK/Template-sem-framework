<?php

class LOG {

    static function writeLog($string) {
        $fp = fopen('log.txt', 'a');
        fwrite($fp, "\n\n");
        fwrite($fp, date("Y/m/d g:i:s") . " -> " . trim($string) . "\n");
        fclose($fp);
    }

}
