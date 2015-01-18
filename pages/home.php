<?php
require_once "../var/Config.php";
require_once "../libs/Session.php";
require_once "../libs/DB.php";
require_once "../libs/Auth.php";
require_once "../libs/Printer.php";
require_once "../libs/Minify.php";

Session::start();

if(!Auth::isAuthorized()) {
    header("location: index.php");
    exit();
}

if(Session::existsVar("SET_ID")) {
    header("location: test.php");
    exit();
}

ob_start("minifyHtml");

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

<div class="container">
    <div class="row margin-top-60">
        <div class="col-md-4 col-md-offset-4">
            <h3>Please select your question set...</h3>
            <div class="list-group">
                <?php
                $query = "SELECT id FROM passage_set";
                $res = DB::query($query, array());

                while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    echo "<a href='set.php?id=" .
                        $row["id"] .
                        "' class='list-group-item'>Set #" .
                        $row["id"] .
                        "</a>";
                }
                ?>
            </div>
        </div>
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