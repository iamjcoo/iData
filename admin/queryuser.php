<?php
require_once("../PHPconnect/phpC.php");
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pwd = md5($_POST['pwd']);
    $rest = $_POST['rest'];

    $query = mysqli_query($link, "INSERT INTO `user`(`username`, `email`, `password`, `restriction`) VALUES ('$uname','$email','$pwd','$rest')");
?>