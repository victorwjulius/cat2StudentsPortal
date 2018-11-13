<?php
session_start();

include 'header.php';
?>
<div class="login-form-main-container btn-warning">
<div class="login-form-wrapper">
    <div class="login-form-header">
        <h3>Teachers' Login</h3>
    </div>
<form action="teachersLoginProcess.php" method="post">
    <p><label for="username/email"><nobr>Username or Email:</nobr></label>
    <input type="text" name="usernameOrEmail" placeholder="Email or Username" class="inp">
    </p>
    <p><label for="password">Password:</label>
    <input type="text" name="password" placeholder="Enter password" class="inp">
    </p>

    <p class="login-error"><?php echo $_SESSION['error'];?></p>

    <input type="submit" name="teachers-login-btn" value="Login">

        <p class="not-registered">
            <nobr>Not registered?
            <a href="teachersRegistrationForm.php">Sign up</a>
            </nobr>
        </p>

</form>
</div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>
