<?php
session_start();
$name = $username = $email = $number = $password = $password2 ="";
$nameErr = $usernameErr = $emailErr = $passwordErr = $success = "";
if (isset($_POST['reg-btn']))
{
    function test_input($data)
    {
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        $data = trim($data);
        return $data;
    }
    if (empty($_POST['name']))
    {
        $nameErr = "Name is required";
    }else
    {
        if (!preg_match("/^[a-zA-Z -]*$/",$_POST['name']))
        {
            $nameErr = "Only letters, hyphens and whitespaces are allowed";
        }else
        {
            $name = test_input($_POST['name']);
        }
    }

    if (empty($_POST['username']))
    {
        $usernameErr = "Username is required";
    }else
    {
        if (!preg_match("/^[a-zA-Z -]*$/",$_POST['username']))
        {
            $usernameErr = "Only letters, hyphens and whitespaces are allowed";
        }else
        {
            $username = test_input($_POST['username']);
        }
    }

    if (empty($_POST['email']))
    {
        $emailErr = "Email is required";
    }else
    {
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid Email format";
        }else
        {
            $email = test_input($_POST['email']);
        }
    }

    if (!preg_match("/^[0-9+]*$/",$_POST['number']))
    {
        $number = "only numbers and '+' are allowed";
    }else
    {
        $number = test_input($_POST['number']);
    }

    if (empty($_POST['password']))
    {
        $passwordErr = "Password is required";
    }else
    {
        if ($_POST['password']===$_POST['password2'])
        {
            $password = test_input($_POST['password']);
        }
    }
    $conn = mysqli_connect("localhost","root","","regandlogin");

    $insert = "INSERT INTO `users`(`id`, `name`, `username`, `email`, `number`, `password`) VALUES (null,'$name','$username','$email','$number','$password')";

    $query = mysqli_query($conn,$insert);

    if ($query)
    {
        header("location:teachersLoginForm.php");
        $_SESSION["error"] = "Saved successfully";
    }else
    {
        $success = "Failed to save,try again later";
    }

}
?>