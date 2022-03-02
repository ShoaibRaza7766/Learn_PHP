<?php
session_start();
if ($_SESSION) {
  header('location:welcome.php');
}

if (isset($_REQUEST['usrnm']) || isset($_REQUEST['email']) || isset($_REQUEST['psw'])) {
  $Username = $_REQUEST['usrnm'];
  $Email = $_REQUEST['email'];
  $Password = $_REQUEST['psw'];
  $_SESSION['Username'] = $Username;
  $_SESSION['email'] = $Email;
  $_SESSION['Password'] = $Password;
  header('location:welcome.php');
  // echo "<script> location.href('welcome.php'); </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Session</title>
</head>

<body>
  <form action="" method="post">
    <h2>Register Form</h2>
    <div class="input-container">
      <i class="fa fa-user icon"></i>
      <input class="input-field" id="usrnm" type="text" placeholder="Username" name="usrnm">
    </div>

    <div class="input-container">
      <i class="fa fa-envelope icon"></i>
      <input class="input-field" id="email" type="text" placeholder="Email" name="email">
    </div>

    <div class="input-container">
      <i class="fa fa-key icon"></i>
      <input class="input-field" id="psw" type="password" placeholder="Password" name="psw">
    </div>

    <button type="submit" class="btn">Register</button>
  </form>
</body>

</html>