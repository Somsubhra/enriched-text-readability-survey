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

$setId = Session::getVar("SET_ID");
$userId = Auth::userId();

if($setId == "") {
    die(json_encode(array(
        "sx" => false
    )));
}

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

echo json_encode(array(
    "sx" => true
));

Session::close();