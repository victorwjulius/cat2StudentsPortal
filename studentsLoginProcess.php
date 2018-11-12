<?php
session_start();
if (!isset($_POST['students-login-btn']))
{
    header("location:studentsLoginForm.php");
    exit();
}else
{
    if ((empty($_POST['usernameOrEmail'])) || (empty($_POST['password'])))
    {
        $_SESSION["serror"] = "Empty username or email";
        header("location:studentsLoginForm.php");
        exit();
    }else
    {
        extract($_POST);
        $conn = mysqli_connect("localhost","root","","students");
        $fetch = "select * from `details` where password='$password' and username='$usernameOrEmail'";

        $query = mysqli_query($conn,$fetch);
        $rows = mysqli_num_rows($query);

        if (!($rows>0))
        {
            $_SESSION["serror"] = "wrong username or password";
            header("location:studentsLoginForm.php");
            exit();
        }else
        {
            $_SESSION["susername"] = "$usernameOrEmail";
            header("location:studentsMaterials.php?x=$usernameOrEmail");
        }
    }
}