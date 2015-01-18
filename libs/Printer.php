<?php

class Printer {

    public static function printCss() {
        $html = '<link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">' .
                '<link rel="stylesheet" href="../public/css/common.css">';

        echo $html;
    }

    public static function printScripts() {
        $html = '<script type="text/javascript" src="../public/jquery/jquery-2.1.1.min.js"></script>' .
             '<script type="text/javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>' .
             '<script type="text/javascript" src="../public/js/common.js"></script>';

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

        $query = "SELECT name FROM user WHERE id=:id";

        $res = DB::query($query, array(
            "id" => $id
        ));

        $name = "";

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $name = $row["name"];
        }

        $html = '<nav class="navbar navbar-default" role="navigation">' .
            '<div class="container-fluid">' .
            '<div class="navbar-header">' .
            '<a class="navbar-brand" href="index.php">' . APP_NAME . '</a>' .
            '</div>' .
            '<ul class="nav navbar-nav navbar-right">' .
            '<li class="active"><a href="home.php">Hi ' . $name .'</a></li>' .
            '<li><a href="javascript:void(0);" data-toggle="modal"' .
            ' data-target="#logout-modal">Finish Test</a></li>' .
            '</ul>' .
            '</div>' .
            '</nav>';

        $html .= '<div class="modal fade" id="logout-modal">' .
                '<div class="modal-dialog">' .
                '<div class="modal-content">' .
                '<div class="modal-header">' .
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' .
                '<span aria-hidden="true">&times;</span></button>' .
                '<h4 class="modal-title">Finish Test?</h4>' .
                '</div>' .
                '<div class="modal-body">' .
                '<p>Are you sure you want to finish the test?</p>' .
                '</div>' .
                '<div class="modal-footer">' .
                '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>' .
                '<a class="btn btn-primary" href="logout.php">Finish Test</a>' .
                '</div>' .
                '</div>' .
                '</div>' .
                '</div>';

        echo $html;
    }

    public static function printRefModal() {
        $html = '<div class="modal fade" id="ref-modal">' .
            '<div class="modal-dialog">' .
            '<div class="modal-content">' .
            '<div class="modal-header">' .
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' .
            '<span aria-hidden="true">&times;</span></button>' .
            '<h4 class="modal-title">Reference</h4>' .
            '</div>' .
            '<div class="modal-body">' .
            '<p id="ref-content"></p>' .
            '</div>' .
            '<div class="modal-footer">' .
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' .
            '</div>' .
            '</div>' .
            '</div>' .
            '</div>';

        print $html;
    }
}