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

$userId = Auth::userId();

$refId = Secure::string($_GET["id"]);

if($refId == "") {
    die(json_encode(array(
        "sx" => false
    )));
}

$query = "INSERT INTO reference_click(reference_id, user_id)
VALUES (:reference_id, :user_id)";

try {
    DB::insert($query, array(
        "reference_id" => $refId,
        "user_id" => $userId
    ));
}
catch(Exception $ex) {
    die(json_encode(array(
        "sx" => false
    )));
}

$query = "SELECT content FROM reference WHERE id=:ref_id";

$res = DB::query($query, array(
    "ref_id" => $refId
));

$content = "";

while($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $content = $row["content"];
}

die(json_encode(array(
    "sx" => true,
    "content" => $content
)));

Session::close();