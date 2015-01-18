<?php
require_once "../libs/Session.php";
Session::start();
Session::end();
header("location: finished.php");