<?php

$conn = mysqli_connect("localhost","root","","students");

if(isset($_POST['id']))
{
    extract($_POST);

    mysqli_query($conn,"UPDATE details SET `admissionNo`='$admissionNo',`name`='$name',`username`='$username',`class`='$class',`parentsNo`='$parentsNo' WHERE id=$id");
    header("location:showStudents.php");
}
?>