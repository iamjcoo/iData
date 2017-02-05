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

    $query = mysqli_query($link, "INSERT INTO `r_publish`(`delivery_unit`, `type`, `title`, `p_duration`, `date_started`, `date_completed`, `date_published`, `jp_type`, `pname`, `vol`, `author`) VALUES ('$du','$tr','$rt','$psd','$mys','$myc','$dp','$tcf','$vcf','$tocf','$na')");
?>