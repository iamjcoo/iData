<?php
require_once("../PHPconnect/phpC.php");
    $researcher = $_POST['researcher'];
    $cresearch = $_POST['research'];

    $query = mysqli_query($link, "INSERT INTO `oresearch`(`researcher`, `research`) VALUES ('$researcher', '$cresearch')");
?>