<?php
require_once("../PHPconnect/phpC.php");
    $du = $_POST['du'];
   	$tr = $_POST['tr'];
   	$rt = $_POST['rt'];
   	$psd = $_POST['psd'];
  	$mys = $_POST['mys'];
   	$myc = $_POST['myc'];
  	$dp = $_POST['dp'];
   	$tcf = $_POST['tcf'];
   	$vcf = $_POST['vcf'];
   	$tocf = $_POST['tocf'];
   	$na = $_POST['na'];
    $rid = $_POST['rid'];

    $query = mysqli_query($link, "UPDATE `r_present` SET `delivery_unit` = '$du', `type` = '$tr', `title` = '$rt', `p_duration` = '$psd', `date_started` = '$mys', `date_completed` = '$myc', `date_presented` = '$dp', `fc_type` = '$tcf', `venue` = '$vcf', `f_title` = '$tocf', `authors` = '$na' WHERE id = '$rid'");
?>