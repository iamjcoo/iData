<?php
require_once("../PHPconnect/phpC.php");
    $semester = $_POST['semester'];
    $sy = $_POST['sy'];

    $query = mysqli_query($link, "INSERT INTO `period`(`semester`, `sy`) VALUES ('$semester', '$sy')");
?>