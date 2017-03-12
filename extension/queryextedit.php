<?php
require_once("../PHPconnect/phpC.php");
	$did = $_POST['did'];
    $pn = $_POST['pn'];
    $du = $_POST['du'];
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
    $npt = $_POST['npt'];
    $tnh = $_POST['tnh'];

    $query = mysqli_query($link, "UPDATE `extension` SET `title` = '$pn', `sdate` = '$sd', `edate` = '$ed', `npt`='$npt', `tnh`='$tnh', `delivery_unit`='$du' WHERE id = '$did'");
?>