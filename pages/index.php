<?php
require_once "../var/Config.php";
require_once "../libs/Printer.php";
require_once "../libs/Minify.php";
require_once "../libs/Auth.php";
require_once "../libs/Session.php";

Session::start();

if(Auth::isAuthorized()) {
    header("location: home.php");
}

ob_start("minifyHtml");
?>

<html>
<head>

    <title>
        <?php echo APP_NAME ?>
    </title>

    <?php Printer::printCss() ?>

    <style>
        form {
            background-color: #f8f8f8;
            padding: 25px;
            border-radius: 5px;
            border: 1px solid #e7e7e7;
        }
    </style>
</head>

<body>

<?php
Printer::printNav();
?>

<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4 margin-top-60">
            <form method="post" action="register.php" role="form">
                <h3>Start Test</h3>
                <?php
                if(Session::existsVar("ERR_MSG")) {
                    echo '<div class="alert alert-danger" role="alert">' .
                        '<span class="glyphicon glyphicon-exclamation-sign"></span> ' .
                        Session::getVar("ERR_MSG") .
                        '</div>';
                    Session::unsetVar("ERR_MSG");
                }
                ?>
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="age" name="age" placeholder="Enter your age in years" class="form-control">
                </div>
                <div class="form-group">
                    <label>I am...</label>
                </div>
                <div class="radio">
                    <label>
                        <input id="male" type="radio" name="gender" value="male">
                        Male
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input id="female" type="radio" name="gender" value="female">
                        Female
                    </label>
                </div>
                <div class="form-group">
                    <input id="submit" type="submit" value="Start Test" class="btn btn-primary">
                </div>
            </form>
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