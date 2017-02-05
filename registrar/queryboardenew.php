<?php
require_once("../PHPconnect/phpC.php");

    $pn = $_POST['pn'];
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

    $query = mysqli_query($link, "INSERT INTO `board_exam`(`pn`, `delivery_unit`, `exam_month`, `year`, `nop1ttsuc`, `1ttsuc`, `tnpirsuc`, `tntirsuc`, `npfttnatl`, `1ttnatl`, `tnpirnatl`, `tntirnatl`) VALUES ('$pn', '$du', '$month', '$year', '$nop1ttsuc', '$fttsuc', '$tnpirsuc', '$tntirsuc', '$npfttnatl', '$fttnatl', '$tnpirnatl', '$tntirnatl')");


?>
