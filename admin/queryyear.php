<?php
require_once("../PHPconnect/phpC.php");
    $period = $_POST['period'];

    $query = mysqli_query($link, "INSERT INTO `dyear`(`year`) VALUES ('$period')");
?>