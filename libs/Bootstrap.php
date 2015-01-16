<?php
require_once "Minify.php";

class Bootstrap {

    public static function start() {

        // Common includes
        require_once "var/Config.php";
        require_once "libs/Session.php";
        require_once "libs/Printer.php";
        require_once "libs/Auth.php";

        // Minifier
        ob_start("minifyHtml");

        Session::start();
    }

    public static function end() {
        Session::close();
    }
}