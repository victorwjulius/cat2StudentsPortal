<?php
session_start();
if (!isset($_POST['teachers-login-btn']))
{
    header("location:teachersLoginForm.php");
    exit();
}
else
{
    if ((!empty($_POST['usernameOrEmail']))and(!empty($_POST['password'])))
    {
        $usernameOrEmail = $_POST['usernameOrEmail'];
        $password = $_POST['password'];
//        $hashedPassword = password_hash("$password",PASSWORD_DEFAULT);
        $conn = mysqli_connect("localhost", "root", "", "students");

        $select = "SELECT `id`, `name`, `username`, `email`, `number`, `password` FROM `users` WHERE password='$password' and (username='$usernameOrEmail' 
                    or email='$usernameOrEmail')";
        $query = mysqli_query($conn, $select);

        $rows = mysqli_num_rows($query);

        if ($rows >= 1)
        {
            $_SESSION["username"] = "$usernameOrEmail";
            header("location:showStudents.php");

        } else
        {
            header("location:teachersLoginForm.php");
            $_SESSION["error"] = "Wrong username or password <br/><span style='color: #000000'><nobr>Forgot password? 
                <a href='resetPassword.php'>Reset password</a></nobr></span>";
        }

    }else
    {
        header("location:teachersLoginForm.php");
        $_SESSION["error"] = "Empty email or username";
    }
}


?>