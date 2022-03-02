<?php
$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "all_files";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
   die("Error".mysqli_connect_error());
}
?>