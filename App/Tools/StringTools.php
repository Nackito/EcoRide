<?php

namespace App\Tools;

class StringTools
{
    //Permet de transformer la première lettre en majiscule et remplace les tirets
    public static function toCamelCase($value, $pascalCase = false){
        $value = ucwords(str_replace(array('-', '_'), ' ', $value));
        $value = str_replace(' ', '', $value);
        if ($pascalCase === false) {
            return lcfirst($value);
        } else {
            return $value;
        }
    }
    public static function toPascalCase($value){

        return self::toCamelCase($value, true);
    }

}