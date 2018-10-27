<?php
$conn = mysqli_connect("localhost","root","","students");

if (isset($_GET['x']))
{
    $id = $_GET['x'];
    mysqli_query($conn,"delete from details where id =$id");
    header("location:showStudents.php");
}
?>