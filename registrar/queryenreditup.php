<?php
require_once("../PHPconnect/phpC.php");

    $uid = $_SESSION['idataregistrarid'];
    $pn = $_POST['pn'];
    $du = $_POST['du'];
    $hc = $_POST['hc'];
    $teu = $_POST['teu'];
    $weights = $_POST['weights'];
    $eid = $_POST['eid'];

    $query = mysqli_query($link, "UPDATE enrolment SET `pn` = '$pn', `delivery_unit` = '$du', `head_count` = '$hc', `total_enr_units` = '$teu', `weights` = '$weights' WHERE id = '$eid'");


?>