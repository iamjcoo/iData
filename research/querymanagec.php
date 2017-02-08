<?php
require_once("../PHPconnect/phpC.php");
    $id = $_POST['data'];

    $query = mysqli_query($link, "DELETE FROM cresearcher WHERE id = '$id'");
?>