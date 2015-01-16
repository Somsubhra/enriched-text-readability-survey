<?php

class Printer {

    public static function printCss() {
        $html = '<link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">' .
                '<link rel="stylesheet" href="../public/css/common.css">';

        echo $html;
    }

    public static function printScripts() {
        $html = '<script type="text/javascript" src="../public/jquery/jquery-2.1.1.min.js"></script>' .
             '<script type="text/javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>';

        echo $html;
    }

    public static function printNav() {
        $html = '<nav class="navbar navbar-default" role="navigation">' .
                '<div class="container-fluid">' .
                '<div class="navbar-header">' .
                '<a class="navbar-brand" href="index.php">' . APP_NAME . '</a>' .
                '</div>' .
                '</div>' .
                '</nav>';

        echo $html;
    }

    public static function printAuthNav($id) {
        $html = '<nav class="navbar navbar-default" role="navigation">' .
            '<div class="container-fluid">' .
            '<div class="navbar-header">' .
            '<a class="navbar-brand" href="index.php">' . APP_NAME . '</a>' .
            '</div>' .
            '<ul class="nav navbar-nav navbar-right">' .
            '<li class="active"><a href="home.php">Hi ' . User::nameFromId($id) .'</a></li>' .
            '<li><a href="logout.php">Logout</a></li>' .
            '</ul>' .
            '</div>' .
            '</nav>';

        echo $html;
    }
}