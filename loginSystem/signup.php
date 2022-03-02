<?php
 $showAlert = false;
 $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partial/dbconnect.php';
  $username = $_POST['uname'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $Existsql = "SELECT * FROM user WHERE uname='$username'";
  $exresult = mysqli_query($conn,$Existsql);
  $numexrows = mysqli_num_rows($exresult);
  if($numexrows > 0){
    $showError = "User Already Exsist....";
  }
  else{
    if(($password == $cpassword )){
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql= "INSERT INTO user ( `uname`, `password`) VALUES ('$username', '$hash')";
      $result = mysqli_query($conn, $sql);
      if($result){
        $showAlert = true;
      }
    }else{
      $showError = "Password does't match....";
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Signup</title>
</head>

<body>
    <?php require 'partial/nav.php' ?>
    <?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> You account has been successfully created......!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

if($showError){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error</strong>'.$showError.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
?>


    <div class="div container">
        <h2 class="text-center">Sign up To Our Website...!</h2>
        <form action="/loginsystem/signup.php" method="POST">
  <div class="col-md-6">
    <label for="exampleInputusername"  class="form-label">User Name</label>
    <input type="text" maxlength="11" name="uname" class="form-control" id="exampleInputusername" aria-describedby="usernamelHelp">
    
  </div>
  <div class="col-md-6">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="col-md-6">
    <label for="exampleInputPassword1" class="form-label">Conform Password</label>
    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
    <div id="passwordHelp" class="form-text">Make sure to type the same password.</div>
  </div>
  <button type="submit" class="btn btn-primary">signup</button>
</form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>