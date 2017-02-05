<?php
require_once("../PHPconnect/phpC.php");

    $pn = $_POST['pn'];
    $du = $_POST['du'];
    $telp = $_POST['telp'];
    $tety = $_POST['tety'];
    $tngapril = $_POST['tngapril'];
    $tngsummer = $_POST['tngsummer'];
    $tngoctober = $_POST['tngoctober'];
    $priority = $_POST['priority'];
    $mandated = $_POST['mandated'];
    $weights = $_POST['weights'];
    $period = $_POST['period'];
    $gid = $_POST['gid'];

    $query = mysqli_query($link, "UPDATE `graduates` SET`delivery_unit` = '$du', `pn` =' $pn', `priority` = '$priority', `mandated` = '$mandated', `telp` = '$telp', `tety` = '$tety',`tngapril` = '$tngapril', `tngsummer` = '$tngsummer', `tngoctober` = '$tngoctober', `year` = '$period', `weights` = '$weights' WHERE id = '$gid'");


?>