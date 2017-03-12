<?php
require_once("../PHPconnect/phpC.php");
    $id = $_POST['data'];
    
    $sql= "DELETE FROM graduates WHERE delivery_unit = '$id';";
    $sql.= "DELETE FROM enrolment WHERE delivery_unit = '$id';";
    $sql.= "DELETE FROM board_exam WHERE delivery_unit = '$id';";
    $sql.= "DELETE FROM r_present WHERE delivery_unit = '$id';";
    $sql.= "DELETE FROM r_publish WHERE delivery_unit = '$id';";
    $sql.= "DELETE FROM extension WHERE delivery_unit = '$id';";
    $sql.= "DELETE FROM delivery_units WHERE id = '$id'";
    
    $query = mysqli_multi_query($link, $sql);
    
?>