<?php
require_once("../PHPconnect/phpC.php");
$did= $_POST["data"];
mysqli_query($link, "DELETE FROM graduates WHERE id = '$did'");

?>
