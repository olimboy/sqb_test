<?php

namespace app\helpers;

class Utilities
{
    public static function d(){
        echo '<pre>';
        foreach (func_get_args() as $arg){
            print_r($arg);
            echo '<br>';
        }
        echo '</pre>';
    }

    public static function dd(){
        call_user_func_array('self::d', func_get_args());
        die();
    }

    public static function checkDate($date){
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
            return true;
        } else {
            return false;
        }
    }
}