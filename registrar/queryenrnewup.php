<?php
require_once("../PHPconnect/phpC.php");

    $uid = $_SESSION['idataregistrarid'];
    $pn = $_POST['pn'];
    $du = $_POST['du'];
    $hc = $_POST['hc'];
    $teu = $_POST['teu'];
    $weights = $_POST['weights'];
    $period = $_POST['period'];

    $query = mysqli_query($link, "INSERT INTO `enrolment`( `pn`,`period`, `prog_sort`, `delivery_unit`, `head_count`, `total_enr_units`, `weights`, `user`) VALUES ('$pn','$period', 'Undergraduate', '$du', '$hc', '$teu', '$weights', '$uid')");


?>