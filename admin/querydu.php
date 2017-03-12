<?php
require_once("../PHPconnect/phpC.php");
    $du = $_POST['du'];
    $acronym = $_POST['acronym'];

    $query = mysqli_query($link, "INSERT INTO `delivery_units`(`name`, `acronym`) VALUES ('$du', '$acronym')");
?>