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
<body class="save-student">
<h1 class="header">Add Student</h1>
<hr>

<p class="logged-in">You are logged in as <?php echo $_SESSION['username'] ;?></p>
<p class="logged-in"><a href="teachersLoginForm.php">Log-Out</a></p>

<div class="form-wrapper">
    <div class="add-header">
        <h3>Add Student</h3>
    </div>
<form action="saveStudentProcess.php" method="get">
    <input type="number" name="admissionNo" placeholder="Admission number">
    <input type="text" name="name" placeholder="Student's full name">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="password" value="<?php echo date("Y");?>">
    <input type="date" name="dob" placeholder="dd-mm-yyyy">
    <label for="gender">Gender:</label><br>
    <nobr>
    <span class="male"><input type="radio" name="gender" value="male"><label for="male">male</label></span>
    <span class="female"><input type="radio" name="gender" value="female"><label for="female">female</label></span>
    <span class="other"><input type="radio" name="gender" value="other"><label for="other">other</label></span>
    </nobr>
    <input type="text" name="class" placeholder="Student's class">
    <input type="text" name="parentsNo" placeholder="Guardian's Phone">
    <input type="submit" name="submit_btn" value="Save">
    <a href="showStudents.php" class="btn bg-warning form-cancel">Show Students</a>
</form>
</div>
</body>
</html>