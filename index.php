<?php
require_once "libs/Bootstrap.php";
Bootstrap::start();
?>

<html>
<head>

    <title>
        <?php echo APP_NAME ?>
    </title>

    <?php Printer::printCss() ?>

</head>

<body>

<?php
Printer::printScripts();
Printer::printNav();
?>
</body>

</html>

<?php
Bootstrap::end();
?>