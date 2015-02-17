<?php

class Secure {

    public static function string($string, $stripHtml = true) {
//        $string = mysql_real_escape_string($string);
//
//        if($stripHtml) {
//            $string = strip_tags($string);
//        }

        return $string;
    }

}