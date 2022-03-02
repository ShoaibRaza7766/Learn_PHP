<?php
//connet to database
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

//connection 
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  die ("sorry to connect with database:" . mysqli_connect_error());
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  $Title = $_POST["title"];
  $Description = $_POST["desciption"];
  $inst = "INSERT INTO notes (title,desciption) VALUE('$Title', '$Description')";
  if (mysqli_query($conn, $inst)) {
      // echo "new record inserted successfully";
      $insert = true;
  } else {
      echo "enable to insert data";
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  CSS -->
   
    <!-- Bootstrap CSS -->
   
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
     <script>
       $(document).ready( function () {
      $('#myTable').DataTable();
      } );
     </script>

    <title>PHP CRUD Application</title>
  </head>
  <body>
    <!-- Edit  modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
  Edit modal
</button>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PHP CRUD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <?php
      if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success...!</strong>Your notes has been successfully inserted 
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
      ?>
      <div class="container my-4">
          <h2>Add a Note</h2>
        <form action="/crudApplication/index.php" method="POST">
            <div class="mb-3 mt-3">
              <label for="title" class="form-label">Note Title :</label>
              <input type="text" class="form-control" id="title" placeholder="Add Note Title HERE ..." name="title">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Note Description:</label>
              <textarea class="form-control" id="description" name="desciption" placeholder="Add Note Description Here..." rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note..</button>
          </form>
      </div>
      <div class="container my-4">
          <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action  </th>
    </tr>
  </thead>
  <tbody>
  <?php
          $sql = "SELECT * FROM notes";
          $result = mysqli_query($conn,$sql) or die("connection unsuccessfull..");
          $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $sno =0;
                foreach ($data as $row){
                  $sno = $sno+1;
                  echo "<tr>
                  <th scope='row'>".$sno."</th>
                  <td>".$row['title']."</td>
                  <td>".$row['desciption']."</td>
                  <td><a href='/Edit'>Edit</a> <a href='/del'>Delete</a></td>
                </tr>";

                }
          ?> 
  </tbody>
</table>
      </div>
      <hr>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>