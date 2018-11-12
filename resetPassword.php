<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset pass</title>
</head>
<body>
<?php
        $conn = mysqli_connect("localhost", "root", "", "regandlogin");
        $error = "";
        if (isset($_POST['reset-btn']))
        {
            $email = $_POST['emailOrUsername'];
            $username = $_POST['emailOrUsername'];
            $select = "select `id`, `name`, `username`, `email`, `number`, `password` from users where email='$email' or (username='$username')";
            $result = mysqli_query($conn,$select);

            $rows = mysqli_num_rows($result);

            if ($rows!=0)
            {
                header("location:resetPasswordProcess.php");
            }else
            {
                $error = "Wrong credentials";
            }
        }
?>
<form action="resetPassword.php" method="post">
    <input type="email" name="emailOrUsername" placeholder="Enter email or username">
    <input type="submit" name="reset-btn" VALUE="Reset">
    <?php echo $error;?>
</form>
</body>
</html>
