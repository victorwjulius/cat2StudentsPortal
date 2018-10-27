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
    <title>Update</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>
<body>
<h1>Update student's info</h1>
<hr>

<p class="logged-in">You are logged in as <?php echo $_SESSION['username'] ;?></p>
<p class="logged-in"><a href="teachersLoginForm.php">Log-Out</a></p>

<div class="form-wrapper">
    <div class="add-header">
        <h3>Update Student</h3>
    </div>
<form action="updateStudentsProcess.php" method="post">
    <?php
    $conn = mysqli_connect("localhost","root","","students");
    $id = $_GET['x'];

    $fetch = mysqli_query($conn,"select * from details where id=$id");
    $row = mysqli_fetch_assoc($fetch);

    extract($row);
    ?>
    <input type="number" name="admissionNo" placeholder="Admission number" value="<?php echo $admissionNo;?>">
    <input type="text" name="name" placeholder="Student's name" value="<?php echo $name;?>">
    <input type="text" name="username" placeholder="Student's username" value="<?php echo $username;?>">
    <input type="text" name="class" placeholder="Student's class" value="<?php echo $class;?>">
    <input type="text" name="parentsNo" placeholder="Parent's Phone" value="<?php echo $parentsNo;?>">
    <input type="text" name="id" value="<?php echo $id?>" hidden>
    <input type="submit" name="update_btn" value="Update">
    <a href="showStudents.php" class="btn bg-warning form-cancel">Cancel</a>

</form>
</div>
</body>
</html>
