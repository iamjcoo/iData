<?php
require_once("../PHPconnect/phpC.php");
    $pn = $_POST['pn'];
    $du = $_POST['du'];
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
    $npt = $_POST['npt'];
    $tnh = $_POST['tnh'];

    $query = mysqli_query($link, "INSERT INTO `extension`(`title`, `sdate`, `edate`, `npt`, `tnh`, `delivery_unit`) VALUES ('$pn', '$sd', '$ed', '$npt', '$tnh', '$du')");
?>