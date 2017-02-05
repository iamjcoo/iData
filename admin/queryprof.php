<?php
require_once("../PHPconnect/phpC.php");
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pwd = md5($_POST['pwd']);
    $id = $_POST['id'];

    $query = mysqli_query($link, "UPDATE `user` SET `username`= '$uname', `email`='$email', `password`='$pwd' WHERE id='$id'");
?>