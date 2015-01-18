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

try {
    $query = "INSERT INTO user_set(user_id, set_id)
    VALUES(:user_id, :set_id)";

    DB::insert($query, array(
        "user_id" => Auth::userId(),
        "set_id" => $setId
    ));
}
catch(Exception $ex) {
    header("location: home.php");
    Session::close();
    exit();
}

Session::setVar("SET_ID", $setId);
header("location: test.php");

Session::close();