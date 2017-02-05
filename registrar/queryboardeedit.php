<?php
require_once("../PHPconnect/phpC.php");

    $pn = $_POST['pn'];
    $bid = $_POST['bid'];
    $du = $_POST['du'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $nop1ttsuc = $_POST['nop1ttsuc'];
    $fttsuc = $_POST['fttsuc'];
    $tnpirsuc = $_POST['tnpirsuc'];
    $tntirsuc = $_POST['tntirsuc'];
    $npfttnatl = $_POST['npfttnatl'];
    $fttnatl = $_POST['fttnatl'];
    $tnpirnatl = $_POST['tnpirnatl'];
    $tntirnatl = $_POST['tntirnatl'];

    $query =mysqli_query($link, "UPDATE `board_exam` SET `pn`='$pn',`delivery_unit`='$du',`exam_month`='$month',`year`='$year',`nop1ttsuc`='$nop1ttsuc',`1ttsuc`='$fttsuc',`tnpirsuc`='$tnpirsuc',`tntirsuc`='$tntirsuc',`npfttnatl`='$npfttnatl',`1ttnatl`='$fttnatl',`tnpirnatl`='$tnpirnatl',`tntirnatl`='$tntirnatl' WHERE id='$bid'");
?>
