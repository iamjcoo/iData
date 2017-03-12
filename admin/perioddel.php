<?php
require_once("../PHPconnect/phpC.php");
    $id = $_POST['data'];
    $sql = "DELETE FROM enrolment WHERE period = '$id';";
    $sql.= "DELETE FROM period WHERE id = '$id'";
    
    $query = mysqli_multi_query($link, $sql);
    
?>