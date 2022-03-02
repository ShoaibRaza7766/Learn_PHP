<?php
include 'dbconnvideo.php';
if (isset($_FILES["video"])) {
    $file_name = $_FILES["video"]["name"];
    $file_size = $_FILES["video"]["size"];
    $file_tmp_name = $_FILES["video"]["tmp_name"];
    $file_type = $_FILES["video"]["type"];

    $pathFileName = time() . "_" . $file_name;
    if (move_uploaded_file($file_tmp_name, "uplode_video/" . $pathFileName)) {
        $sql = "INSERT INTO `video`(`name`, `path_name`) VALUES ('$file_name','$pathFileName')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = " video uploded successfully";
        } else {
            $failed = "something went wrong";
        }
    } else {
        $msz = "please select a video to uplode";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PHP video uplode</title>
</head>

<body>

    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">
                    <h2>File Uplode Example PHP</h2>
                </label>
                <input class="form-control" type="file" name="video" id="formFile"><br><br>
                <?php if (isset($success)) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success; ?>
                    </div>
                <?php } ?>
                <?php if (isset($failed)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $failed; ?>
                    </div>
                <?php } ?>
                <?php if (isset($msz)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msz; ?>
                    </div>
                <?php } ?>
                <input type="submit">
            </div>
        </form>
        <br>
        <div>
            <h2>PHP videos uplode session</h2>
            <?php
            $sql = "SELECT * FROM `video`";
            $result = mysqli_query($conn,  $sql) or die("connection unsucessfully");

            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($data as $row) {
            ?>
                    <video width="320" height="240" controls>
                        <source src="uplode_video/<?php echo $row['path_name']; ?>" type="video/mp4">
                    </video>
                    <p>video Name: <?php echo $row['name']; ?></p>
            <?php }
            } ?>
        </div>


    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>