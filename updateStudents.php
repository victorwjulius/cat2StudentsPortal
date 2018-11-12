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

<div class="admin-nav">

<div class="ssu-header">
<h1>Alice Admin Section</h1>
</div>

    <div class="ssu-after-header">
        <a href="/regAndLog/saveStudent.php" class="ts-link1"><nobr>Save student</nobr></a>
        <a href="/regAndLog/showStudents.php" class="ts-link"><nobr>Show student</nobr></a>
    </div>

</div>

<div class="ssu-student">
<p class="logged-in">You are logged in as <?php echo $_SESSION['username'] ;?></p>
<p class="logged-in"><a href="teachersLoginForm.php">Log-Out</a></p>

<div class="form-wrapper">
    <div class="add-header">
        <h3>Update Student's Details</h3>
    </div>
<form action="updateStudentsProcess.php" method="post">
    <?php
    $conn = mysqli_connect("localhost","root","","students");
    $id = $_GET['x'];

    $fetch = mysqli_query($conn,"select * from details where id=$id");
    $row = mysqli_fetch_assoc($fetch);

    extract($row);
    ?>
    <p class="us-form-p"><label for="admissionNo" class="us-form-label">Admission number:</label>
    <input type="number" name="admissionNo" id="admissionNo" placeholder="Admission number" value="<?php echo $admissionNo;?>">
    </p>

    <p class="us-form-p"><label for="name" class="us-form-label">Student's name:</label>
    <input type="text" name="name" id="name" placeholder="Student's name" value="<?php echo $name;?>">
    </p>

    <p class="us-form-p"><label for="username" class="us-form-label">Username:</label>
    <input type="text" name="username" id="username" placeholder="Student's username" value="<?php echo $username;?>">
    </p>

    <p class="us-form-p"><label for="class" class="us-form-label">Class:</label>
    <input type="text" name="class" id="class" placeholder="Student's class" value="<?php echo $class;?>">
    </p>

    <p class="us-form-p"><label for="parentsNo" class="us-form-label">Guardian's number:</label>
    <input type="text" name="parentsNo" id="parentsNo" placeholder="Parent's Phone" value="<?php echo $parentsNo;?>">
    </p>

    <input type="text" name="id" value="<?php echo $id?>" hidden>
    <input type="submit" name="update_btn" value="Update">
    <a href="showStudents.php" class="btn bg-warning form-cancel">Cancel</a>

</form>
</div>

</div>

<div class="ssu-footer">

    <p>powered by Tazusi.co ltd &copy;<?php echo date("Y");?></p>

</div>
</body>
</html>
