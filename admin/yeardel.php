<?php
require_once("../PHPconnect/phpC.php");
    $id = $_POST['data'];
    $q = mysqli_query($link, "SELECT * FROM dyear WHERE id = '$id'");
    $res=mysqli_fetch_assoc($q);
    $year = $res['year'];
    $sdate = $year . '-01-01';
    $edate = $year . '-12-31'; ?>
    <?php
    $sql = "DELETE FROM graduates WHERE year = '$id';";
    $sql.= "DELETE FROM board_exam WHERE year = '$id';";
    $sql.= "DELETE FROM r_present WHERE date_presented <= '$edate' AND date_presented >= '$sdate';";
    $sql.= "DELETE FROM r_publish WHERE date_published <= '$edate' AND date_published >= '$sdate';";
    $sql.= "DELETE FROM extension WHERE edate >= '$sdate' AND edate <= '$sdate';";
    $sql.= "DELETE FROM dyear WHERE id = '$id'";
    
    $query = mysqli_multi_query($link, $sql);
    
?>