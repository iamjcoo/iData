<?php
require_once("../PHPconnect/phpC.php");
    $id = $_POST['data'];

    $query = mysqli_query($link, "DELETE FROM r_publish WHERE id = '$id'");
?>