<?php
session_start();

include 'header.php';

$conn = mysqli_connect("localhost","root","","students");
$name = $username = $email = $number = $password = $password2 ="";
$nameErr = $usernameErr = $emailErr = $passwordErr = $password2Err = $error = $exist = "";
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

    if (empty($_POST['password2']))
    {
        $password2Err = "Confirm your password";
    }

    if (empty($_POST['password']))
    {
        $passwordErr = "Password is required";
    }else
    {
        if ($_POST['password']===$_POST['password2'])
        {
            $password = test_input($_POST['password']);
            $hashedPassword = password_hash("$password",PASSWORD_DEFAULT);

            $conn = mysqli_connect("localhost","root","","students");
            $search = "select * from `users` where email='$email'";

            $searchQuery = mysqli_query($conn,$search);
            $rows = mysqli_num_rows($searchQuery);

            if ($rows>0)
            {
                $_SESSION["exists"] = "You cannot create more than one account";
                header("location:teachersRegistrationForm.php");
                exit();
            }else
            {
                $_SESSION["exists"] = "";

                $insert = "INSERT INTO `users`(`id`, `name`, `username`, `email`, 
                            `number`, `password`) VALUES (null,'$name',
                            '$username','$email','$number','$hashedPassword')";
                $insertQuery = mysqli_query($conn,$insert);

                if ($insertQuery)
                {
                    header("location:teachersLoginForm.php");
                    $_SESSION["error"] = "<span style='color: #4caf50;grid-column:1/3;text-align: center;align-self: center;padding: 0;margin: 0;'>Saved successfully: Login</span>";
                } else
                {
                    $error = "Failed to save,try again later";
                }
            }


        }
    }
}

?>
<div class="reg-form-main-container bg-warning my-0">
<div class="reg-form-wrapper">
    <div class="form-header">
        <h2><nobr>Teachers' Registration</nobr></h2>
    </div>
    <p class="error-star-definition">* Required fields</p>
<form action="teachersRegistrationForm.php" method="post">
    <p><label for="name">Name:</label>
<nobr><input type="text" name="name" placeholder="Enter name" class="inp"><span class="error-star">*</span></nobr><br/>
        <span class="error"><?php echo $nameErr?></span>
    </p>
    <p><label for="username">Username:</label>
        <nobr><input type="text" name="username" placeholder="Enter nickname" class="inp"><span class="error-star">*</span></nobr><br/>
        <span class="error"><?php echo $usernameErr?></span>
    </p>
    <p><label for="email">Email:</label>
<nobr><input type="text" name="email" placeholder="Enter email" class="inp"><span class="error-star">*</span></nobr><br/>
        <span class="error"><?php echo $emailErr?></span>
    </p>
    <p><label for="number">Phone:</label>
        <input type="text" name="number" placeholder="Enter phone" class="inp">
    </p>
    <p><label for="password">Password:</label>
<nobr><input type="password" name="password" placeholder="Enter password" class="inp"><span class="error-star">*</span></nobr><br/>
        <span class="error"><?php echo $passwordErr?></span>
    </p>
    <p><label for="password2">Confirm password:</label>
<nobr><input type="password" name="password2" placeholder="Confirm password" class="inp"><span class="error-star">*</span></nobr><br/>
        <span class="error"><?php echo $password2Err?></span>
    </p>
    <p class='exists-error' style='grid-column: 1/3;text-align: center;align-self: center;color: red;font-size: 16px'><?php echo $_SESSION["exists"];?></p>
<input type="submit" name="reg-btn" value="Sign-Up">
    <p class="already-registered">Already registered? <a href="teachersLoginForm.php">Login</a></p>
</form>
</div>
</div>

<?php
include 'footer.php';
?>
</body>
</html>
