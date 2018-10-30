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
    <title>Saving</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>
<body>

<div class="admin-nav">

<div class="ssu-header">
<h1 class="header">Alice Admin Section</h1>
</div>

<div class="ssu-after-header">
<a href="/regAndLog/showStudents.php" class="ts-link1"><nobr>Show student</nobr></a>
</div>

</div>

<div class="ssu-student">
<p class="logged-in">You are logged in as <?php echo $_SESSION['username'] ;?></p>
<p class="logged-in"><a href="teachersLoginForm.php">Log-Out</a></p>

<div class="form-wrapper">
    <div class="add-header">
        <h3>Add Student</h3>
    </div>
<form action="saveStudentProcess.php" method="get">
    
    <p class="us-form-p"><label for="admissionNo" class="us-form-label">Admission number:</label>
    <input type="number" name="admissionNo" id="admissionNo" placeholder="Admission number">
    </p>

    <p class="us-form-p"><label for="name" class="us-form-label">Student's full name:</label>
    <input type="text" name="name" id="name" placeholder="Student's full name">
    </p>

    <p class="us-form-p"><label for="username" class="us-form-label">Username:</label>
        <input type="text" name="username" id="username" placeholder="Username">
    </p>

    <p class="us-form-p"><label for="password" class="us-form-label">Password:</label>
        <input type="text" name="password" id="password" value="<?php echo date("Y");?>">
    </p>

    <p class="us-form-p"><label for="dob" class="us-form-label">Date of birth:</label>
        <input type="date" name="dob" id="dob" placeholder="dd-mm-yyyy">
    </p>

    <label for="gender">Gender:</label><br>
    <nobr>
    <span class="male"><input type="radio" name="gender" value="male"><label for="male">male</label></span>
    <span class="female"><input type="radio" name="gender" value="female"><label for="female">female</label></span>
    <span class="other"><input type="radio" name="gender" value="other"><label for="other">other</label></span>
    </nobr>

    <p class="us-form-p"><label for="class" class="us-form-label">Student's class:</label>
        <input type="text" name="class" id="class" placeholder="Student's class">
    </p>

    <p class="us-form-p"><label for="parentsNo" class="us-form-label">Guardian's Phone:</label>
        <input type="text" name="parentsNo" id="parentsNo" placeholder="Guardian's Phone">
    </p>

    <input type="submit" name="submit_btn" value="Save">
</form>
</div>

</div>

<div class="ssu-footer">

    <p>powered by Tazusi.co ltd &copy;<?php echo date("Y");?></p>

</div>
</body>
</html>