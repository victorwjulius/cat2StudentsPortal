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
    <title>Students login</title>
<!--    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">-->
    <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>
<body>
<?php
include 'header.php';
?>
<div class="login-form-main-container bg-warning">
<div class="login-form-wrapper">
    <div class="login-form-header">
        <h3>Student's Login</h3>
    </div>
    <form action="studentsLoginProcess.php" method="post">
        <p><label for="username/email"><nobr>Username or Email:</nobr></label>
            <input type="text" name="usernameOrEmail" placeholder="Email or Username" class="inp">
        </p>
        <p><label for="password">Password:</label>
            <input type="text" name="password" placeholder="Enter password" class="inp">
        </p>

        <p class="login-error"><?php echo $_SESSION['serror'];?></p>

        <input type="submit" name="students-login-btn" value="Login">

    </form>
</div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>
