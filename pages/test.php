<?php
require_once "../var/Config.php";
require_once "../libs/Session.php";
require_once "../libs/DB.php";
require_once "../libs/Auth.php";
require_once "../libs/Printer.php";
require_once "../libs/User.php";
require_once "../libs/Minify.php";

Session::start();

if(!Auth::isAuthorized()) {
    header("location: index.php");
}

if(!Session::existsVar("SET_ID")) {
    header("location: home.php");
    exit();
}

ob_start("minifyHtml");

$userId = Auth::userId();
$setId = Session::getVar("SET_ID");
?>

<html>
<head>
    <title>
        Set #<?php echo $setId ?>
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