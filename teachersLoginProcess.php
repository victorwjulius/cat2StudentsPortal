<?php
session_start();

if (isset($_POST['teachers-login-btn']))
{
    $usernameOrEmail = $_POST['usernameOrEmail'];
    $inputPassword = $_POST['password'];

    if(empty($_POST['password']) || empty($_POST['usernameOrEmail']))
    {
        header("location:teachersLoginForm.php");
        $_SESSION['error'] = "Empty username or password";
    }else
    {

        include 'db.conn.php';

        $select = "select * from users where email='$usernameOrEmail' or (username='$usernameOrEmail')";

        $result = mysqli_query($conn, $select);
        $rows = mysqli_num_rows($result);

        if ($rows<1)
        {
            header("location:teachersLoginForm.php");
            $_SESSION['error'] = "Invalid email or username";
            exit();
        }elseif($rows==1)
        {
           $fetch = mysqli_fetch_assoc($result);
           $username = $fetch['username'];

           if (password_verify($inputPassword,$fetch['password'])==false)
           {
               header("location:teachersLoginForm.php");
               $_SESSION['error'] = "Wrong password";
               exit();
           }elseif (password_verify($inputPassword,$fetch['password'])==true)
           {
               header("location:showStudents.php");
               $_SESSION['username'] = "$usernameOrEmail";
               exit();
           }


        }

    }

}else
{

    header("location:teachersLoginForm.php");
    exit();

}