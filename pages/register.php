<?php
require_once "../libs/Session.php";
require_once "../libs/Secure.php";
require_once "../libs/DB.php";

Session::start();

$name = Secure::string($_POST["name"]);
$age = Secure::string($_POST["age"]);
$gender = Secure::string($_POST["gender"]);

if($name == "" || $age == "" || $gender == "") {
    Session::setVar("ERR_MSG", "All fields are required");
    header("location: index.php");
    exit();
}

$query = "INSERT INTO user(name, age, gender)
VALUES(:name, :age, :gender)";

$userId = DB::insert($query, array(
    "name" => $name,
    "age" => $age,
    "gender" => $gender
));

if(isset($userId)) {
    Session::setVar("USER_ID", $userId);
    header("location: home.php");
} else {
    header("location: index.php");
}

Session::close();