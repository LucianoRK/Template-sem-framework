<?php

class ARRAYS
{

    static function utf8EncodeDeep(&$array)
    {
        if (is_string($array)) {
            $array = utf8_encode($array);
        } else if (is_array($array)) {
            foreach ($array as &$value) {
                self::utf8EncodeDeep($value);
            }
            unset($value);
        } else if (is_object($array)) {
            $vars = array_keys(get_object_vars($array));
            foreach ($vars as $var) {
                self::utf8EncodeDeep($array->$var);
            }
        }
    }

    static function pre_print($array, $die = true)
    {
        echo "<pre>";
        print_r($array);
        echo $die ? die() : "</pre>";
    }

    static function unserializeForm($str) {
        $return_data = array();
        $strArray    = explode("&", $str);
       
        foreach ($strArray as $item) {
            $array                  = explode("=", $item);
            $return_data[$array[0]] = urldecode($array[1]);
        }
         return $return_data;
    }
}
