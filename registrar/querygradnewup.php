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

    $query = mysqli_query($link, "INSERT INTO `graduates`(`delivery_unit`, `pn`, `prog_sort`, `priority`, `mandated`, `telp`, `tety`,`tngapril`, `tngsummer`, `tngoctober`, `year`, `weights`) VALUES ('$du', '$pn', 'Undergraduate', '$priority', '$mandated', '$telp', '$tety', '$tngapril', '$tngsummer', '$tngoctober', '$period', '$weights')");


?>