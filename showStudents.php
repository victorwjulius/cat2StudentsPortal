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
    <title>Services</title>
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
</div>

</div>

<div class="ssu-student">
<p class="logged-in">You are logged in as <?php echo $_SESSION['username'] ;?></p>
<p class="logged-in"><a href="teachersLoginForm.php">Log-Out</a></p>

<div class="table">
    <h3>Table for Students' Details</h3>
<table cellpadding="7">
    <caption>Students' Details</caption>
    <tr>
        <th><nobr>Admission Number</nobr></th>
        <th>Name</th>
        <th>Username</th>
        <th>D.O.B</th>
        <th>Gender</th>
        <th>Class</th>
        <th><nobr>Guardian's Number</nobr></th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
    $conn  = mysqli_connect("localhost","root","","students");
    $fetch = mysqli_query($conn,"select * from details");

    while($row = mysqli_fetch_assoc($fetch))
    {
        extract($row);
        echo "
<tr>
<td>$admissionNo</td>
<td>$name</td>
<td>$username</td>
<td>$dob</td>
<td>$gender</td>
<td>$class</td>
<td>$parentsNo</td>
<td><a href='updateStudents.php?x=$id'><button class='btn btn-success'>Update</button></a></td>
<td><a href='deleteStudents.php?x=$id'><button class='btn btn-danger'>Delete</button></a></td>
</tr>
";
    }
    ?>
</table>
</div>

</div>

<div class="ssu-footer">

    <p>powered by Tazusi.co ltd &copy;<?php echo date("Y");?></p>

</div>
</body>
</html>
