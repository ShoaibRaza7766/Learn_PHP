<?php
$stu_id = $_POST['sid'];
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST ["sphone"];

$conn = mysqli_connect("localhost", "root", "", "practice")  or die("connection failed");
$sql ="UPDATE student SET Sname ='{$stu_name}', Saddress ='{$stu_address}', Sclass='{$stu_class}', Sphone ='{$stu_phone}' WHERE Sid ={$stu_id}";

$result = mysqli_query($conn, $sql)  or die("Query unsuccessfull");

header("Location:http://localhost/crud/index.php");

mysqli_close($conn);
?>