<?php
require_once "../var/Config.php";
require_once "../libs/Session.php";
require_once "../libs/DB.php";
require_once "../libs/Auth.php";
require_once "../libs/Printer.php";
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

$query = "INSERT INTO passage_click(passage_id, set_id, user_id)
VALUES(:passage_id, :set_id, :user_id)";

DB::insert($query, array(
    "passage_id" => $passageId,
    "set_id" => $setId,
    "user_id" => $userId
));

$query = "SELECT creation_time FROM user_set
WHERE user_id=:user_id AND set_id=:set_id";

$res = DB::query($query, array(
    "user_id" => $userId,
    "set_id" => $setId
));

$testStartTime = date_create($res->fetchColumn())->getTimestamp();
$timeNow = time();
$timeSpent = $timeNow - $testStartTime;
$timeLeft = TEST_TIME - $timeSpent;
$minutesLeft = intval($timeLeft / 60) % 60;
$secondsLeft = $timeLeft % 60;
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
        <div class="well">
            <h1 class="text-center">
                <span class="glyphicon glyphicon-time"></span>
            </h1>
            <div id="timer" class="text-center">
                <?php echo $minutesLeft . " mins, " . $secondsLeft . " secs" ?> remaining
            </div>
        </div>
        <div class="list-group">
            <?php
            $query = "SELECT id FROM passage WHERE set_id=:set_id";
            $res = DB::query($query, array(
                "set_id" => $setId
            ));

            while($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $rowId = $row["id"];

                $active = "";
                if($passageId == $rowId) {
                    $active = "active";
                }

                $query1 = "SELECT COUNT(*) FROM question
                WHERE passage_id=:passage_id AND set_id=:set_id";

                $res1 = DB::query($query1, array(
                    "passage_id" => $rowId,
                    "set_id" => $setId
                ));

                $totalQuestions = $res1->fetchColumn();

                $query1 = "SELECT COUNT(DISTINCT question_id) FROM response
                WHERE set_id=:set_id AND passage_id=:passage_id AND user_id=:user_id";

                $res1 = DB::query($query1, array(
                    "set_id" => $setId,
                    "passage_id" => $rowId,
                    "user_id" => $userId
                ));

                $answered = $res1->fetchColumn();

                echo "<a href='test.php?id=" .
                    $rowId .
                    "' class='list-group-item $active'>Passage #" .
                    $rowId .
                    "<span class='badge'>" . $answered . "/" . $totalQuestions . "</span>" .
                    "</a>";
            }
            ?>
        </div>
    </div>
    <div class="col-md-10">
        <h3>Read the following passage and answer the questions</h3>
        <hr>
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
        <h4>Questions</h4>
        <ul class="list-group">
            <?php
            $query = "SELECT id, content FROM question
            WHERE passage_id=:passage_id AND set_id=:set_id";

            $res = DB::query($query, array(
                "passage_id" => $passageId,
                "set_id" => $setId
            ));

            while($row = $res->fetch(PDO::FETCH_ASSOC)) {

                $questionId = $row["id"];

                // Get the selected choice if any
                $query1 = "SELECT choice_id FROM response
                WHERE question_id=:question_id AND passage_id=:passage_id
                AND set_id=:set_id AND user_id=:user_id
                ORDER BY creation_time";

                $res1 = DB::query($query1, array(
                    "question_id" => $questionId,
                    "passage_id" => $passageId,
                    "set_id" => $setId,
                    "user_id" => $userId
                ));

                $selectedChoice = -1;
                while($row1 = $res1->fetch(PDO::FETCH_ASSOC)) {
                    $selectedChoice = $row1["choice_id"];
                }

                $html = "<li class='list-group-item'>";
                $html .= $row["content"];

                $query1 = "SELECT id, content FROM choice
                WHERE question_id=:question_id AND passage_id=:passage_id AND set_id=:set_id";

                $res1 = DB::query($query1, array(
                    "question_id" => $questionId,
                    "passage_id" => $passageId,
                    "set_id" => $setId
                ));

                while($row1 = $res1->fetch(PDO::FETCH_ASSOC)) {

                    $choiceId = $row1["id"];
                    $selected = "";
                    if($selectedChoice == $choiceId) {
                        $selected = "checked";
                    }

                    $value = $choiceId . "_" . $questionId . "_" . $passageId;
                    $html .= "<div class='radio'><label><input type='radio' name='ans_" .
                        $questionId . "' class='res-inp' value='" . $value . "' $selected> " .
                        $row1["content"] . "</label></div>";
                }

                $html .= "</li>";

                echo $html;
            }
            ?>
        </ul>
    </div>
</div>
<?php
Printer::printRefModal();
Printer::printScripts();
?>
<script>
    $(document).ready(function() {
        startCountdown('<?php echo $timeLeft ?>');
    });
</script>
</body>
</html>