<?php
require_once "../var/Config.php";
require_once "../libs/Printer.php";
require_once "../libs/Minify.php";
require_once "../libs/Auth.php";
require_once "../libs/Session.php";

Session::start();

if(Auth::isAuthorized()) {
    header("location: home.php");
}

ob_start("minifyHtml");
?>

    <html>
    <head>

        <title>
            <?php echo APP_NAME ?>
        </title>

        <?php Printer::printCss() ?>

        <style>
        </style>
    </head>

    <body>

    <?php
    Printer::printNav();
    ?>

    <div class="container">
        <div class="well margin-top-60">
            <h1>Thanks for your time!</h1>
            <h3>The data you generated during the test will provide us
                useful stats for our research @IRLAB, DA-IICT.</h3>
        </div>
    </div>

    <?php
    Printer::printScripts();
    ?>
    </body>

    </html>

<?php
Session::close();
?>