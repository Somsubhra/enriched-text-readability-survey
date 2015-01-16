<?php

class Session {

    public static function start() {
        session_start();
    }

    public static function setVar($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function unsetVar($key) {
        unset($_SESSION[$key]);
    }

    public static function unsetAllVars() {
        session_unset();
    }

    public static function getVar($key) {
        return $_SESSION[$key];
    }

    public static function close() {
        session_write_close();
    }

    public static function end() {
        session_destroy();
    }

    public static function existsVar($key) {
        return isset($_SESSION[$key]);
    }
}