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

<div class="container">
    <div class="col-md-2">
        <div class="list-group">
            <?php
            $query = "SELECT id FROM question WHERE set_id=:set_id";
            $res = DB::query($query, array(
                "set_id" => $setId
            ));

            while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<a href='test.php?id=" .
                    $row["id"] .
                    "' class='list-group-item'>Question #" .
                    $row["id"] .
                    "</a>";
            }
            ?>
        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>
<?php
Printer::printScripts();
?>
</body>
</html>