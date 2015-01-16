<?php
require_once "../libs/Session.php";
require_once "../libs/Secure.php";
require_once "../libs/DB.php";
require_once "../libs/Auth.php";

Session::start();

if(!Auth::isAuthorized()) {
    header("location: index.php");
    exit();
}

if(Session::existsVar("SET_ID")) {
    header("location: test.php");
    exit();
}

$setId = Secure::string($_GET["id"]);

$query = "SELECT COUNT(*) FROM question_set WHERE id=:id";
$res = DB::query($query, array(
    "id" => $setId
));

if($res->fetchColumn() == 1) {
    Session::setVar("SET_ID", $setId);
    header("location: test.php");
} else {
    header("location: home.php");
}

Session::close();