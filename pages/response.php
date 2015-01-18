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

if(!isset($_GET["res"]) || !isset($_GET["t"])) {
    die(json_encode(array(
        "sx" => false,
    )));
}

$response = Secure::string($_GET["res"]);
$responseTime = Secure::string($_GET["t"]);

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

// Select the maximum of response time of all response
// for the passage and add it to the response time
$query = "SELECT MAX(response_time) FROM response
WHERE passage_id=:passage_id AND set_id=:set_id AND user_id=:user_id";

$res = DB::query($query, array(
    "passage_id" => $passageId,
    "set_id" => $setId,
    "user_id" => $userId
));

if($offset = $res->fetchColumn()) {
    $responseTime += $offset;
}

// Add the response
$query = "INSERT INTO response(question_id, passage_id, set_id, choice_id, user_id, response_time)
VALUES(:question_id, :passage_id, :set_id, :choice_id, :user_id, :response_time)";

DB::insert($query, array(
    "question_id" => $questionId,
    "passage_id" => $passageId,
    "set_id" => $setId,
    "choice_id" => $choiceId,
    "user_id" => $userId,
    "response_time" => $responseTime
));

echo json_encode(array(
    "sx" => true
));

Session::close();