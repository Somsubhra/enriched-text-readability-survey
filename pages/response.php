<?php
require_once "../libs/DB.php";
require_once "../libs/Session.php";
require_once "../libs/Auth.php";
require_once "../libs/Secure.php";

header("Content-Type: application/json");

Session::start();

if(!Auth::isAuthorized()) {
    die(json_encode(array(
        "sx" => false
    )));
}

if(!isset($_GET["res"])) {
    die(json_encode(array(
        "sx" => false,
    )));
}

$response = Secure::string($_GET["res"]);

$type = "mcq";

if(isset($_GET["t"])) {
    $type = Secure::string($_GET["t"]);
}

$setId = Session::getVar("SET_ID");
$userId = Auth::userId();

if($setId == "") {
    die(json_encode(array(
        "sx" => false
    )));
}

if($type == "mcq") {
    $response = explode("_", $response);

    if(sizeof($response) < 3) {
        die(json_encode(array(
            "sx" => false
        )));
    }

    $choiceId = $response[0];
    $questionId = $response[1];
    $passageId = $response[2];

    // Add the response
    $query = "INSERT INTO response(question_id, passage_id, set_id, choice_id, user_id)
    VALUES(:question_id, :passage_id, :set_id, :choice_id, :user_id)";

    DB::insert($query, array(
        "question_id" => $questionId,
        "passage_id" => $passageId,
        "set_id" => $setId,
        "choice_id" => $choiceId,
        "user_id" => $userId
    ));

} elseif($type == "text") {

    $response = explode("_", $response);

    if(sizeof($response) < 2) {
        die(json_encode(array(
            "sx" => false
        )));
    }

    $questionId = $response[0];
    $passageId = $response[1];

    $content = "";

    if(isset($_GET["c"])) {
        $content = Secure::string($_GET["c"]);
    }

    $query = "INSERT INTO response_text(question_id, passage_id, set_id, content, user_id)
    VALUES(:question_id, :passage_id, :set_id, :content, :user_id)";

    DB::insert($query, array(
        "question_id" => $questionId,
        "passage_id" => $passageId,
        "set_id" => $setId,
        "content" => $content,
        "user_id" => $userId
    ));

} else {
    die(json_encode(array(
        "sx" => false
    )));
}

echo json_encode(array(
    "sx" => true
));

Session::close();