<?php

class Auth {

    public static function isAuthorized() {

        $auth = true;

        if(!Session::existsVar("USER_ID") || (trim(Session::getVar("USER_ID")) == '')) {
            $auth = false;
        }

        return $auth;

    }

    public static function userId() {

        $userId = Session::getVar("USER_ID");
        return $userId;

    }
} 