<?php
require_once("../PHPconnect/phpC.php");
    $researcher = $_POST['researcher'];

    $query = mysqli_query($link, "INSERT INTO `researcher`(`researcher`) VALUES ('$researcher')");
?>