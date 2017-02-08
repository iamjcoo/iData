<?php
require_once("../PHPconnect/phpC.php");
    $rid = $_POST['rid'];
    $cresearch = $_POST['research'];

    $query = mysqli_query($link, "UPDATE `oresearch` SET research = '$cresearch' WHERE id = '$rid'");
?>