<?php
require_once("../PHPconnect/phpC.php");
    $rid = $_POST['rid'];
    $cresearch = $_POST['research'];

    $query = mysqli_query($link, "UPDATE `cresearcher` SET research = '$cresearch' WHERE id = '$rid'");
?>