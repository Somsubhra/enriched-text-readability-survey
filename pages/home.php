<?php
require_once "../var/Config.php";
require_once "../libs/Session.php";
require_once "../libs/DB.php";
require_once "../libs/Auth.php";
require_once "../libs/Printer.php";
require_once "../libs/User.php";

Session::start();

if(!Auth::isAuthorized()) {
    header("location: index.php");
}

$userId = Auth::userId();
?>
<html>
<head>
    <title>
        Home
    </title>
    <?php
    Printer::printCss();
    ?>
</head>
<body>
<?php
Printer::printAuthNav($userId);
?>
<?php
Printer::printScripts();
?>
</body>
</html>
<?php
Session::close();
?>