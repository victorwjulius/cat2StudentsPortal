<?php
session_start();
if (isset($_GET['submit_btn']))
{
    $conn = mysqli_connect("localhost","root","","students");
    if (!$conn){
        header("location:saveStudent.php");
        $_SESSION['error'] = "Failed to connect to database!";
    }else{
        $admissionNo = $_GET['admissionNo'];
        $name = $_GET["name"];
        $username = $_GET["username"];
        $password = $_GET["password"];
        $dob = $_GET["dob"];
        $gender = $_GET["gender"];
        $class = $_GET["class"];
        $numberTmp = filter_var($_GET["parentsNo"],FILTER_SANITIZE_STRING);
        $numberTmp1 = stripcslashes($numberTmp);
        $parentsNo = trim($numberTmp1);

        $insert = "INSERT INTO `details`(`id`, `admissionNo`, `name`,`username`,`password`,`dob`,`gender`, `class`, `parentsNo`) VALUES 
                    (null,'$admissionNo','$name','$username','$password','$dob','$gender','$class','$parentsNo')";
        $query = mysqli_query($conn,$insert);

        if ($query){
            header("location:showStudents.php?success");
//            $_SESSION['success'] = "Saved successfully";
        }else{
            header("location:saveStudent.php");
            $_SESSION['success'] = "Failed to save; try again later";
        }
    }
}else
{
    $_SESSION["success"] = "Empty fields";
}
?>