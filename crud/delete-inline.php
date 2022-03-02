<?php 
$conn = mysqli_connect("localhost","root","","practice")  or die("connection failed");
 $stu_id = $_GET['id'];
$sql= "DELETE FROM student WHERE Sid = {$stu_id}";
$result = mysqli_query($conn,$sql) or die ("connection unsuccesfully");

header("Location: http://localhost/crud/index.php");
mysqli_close($conn);



?>