<?php
require_once("../PHPconnect/phpC.php");
$did= $_POST["data"];
mysqli_query($link, "DELETE FROM board_exam WHERE id = '$did'");

?>
