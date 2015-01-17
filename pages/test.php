<?php
require_once "../var/Config.php";
require_once "../libs/Session.php";
require_once "../libs/DB.php";
require_once "../libs/Auth.php";
require_once "../libs/Printer.php";
require_once "../libs/User.php";
require_once "../libs/Minify.php";
require_once "../libs/Secure.php";

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

if(isset($_GET["id"])) {
    $passageId = Secure::string($_GET["id"]);
} else {
    $passageId = "1";
}

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
            $query = "SELECT id FROM passage WHERE set_id=:set_id";
            $res = DB::query($query, array(
                "set_id" => $setId
            ));

            while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<a href='test.php?id=" .
                    $row["id"] .
                    "' class='list-group-item'>Passage #" .
                    $row["id"] .
                    "</a>";
            }
            ?>
        </div>
    </div>
    <div class="col-md-10">
        <div class="well">
            <?php
            $query = "SELECT content FROM passage
            WHERE id=:passage_id AND set_id=:set_id";

            $res = DB::query($query, array(
                "passage_id" => $passageId,
                "set_id" => $setId
            ));

            $content = "";
            while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $content = $row["content"];
            }

            echo $content;
            ?>
        </div>
    </div>
</div>
<?php
Printer::printScripts();
?>
</body>
</html>