<?php
 include 'dbconn.php';
if(isset($_FILES["image"])){
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_tmp_name = $_FILES["image"]["tmp_name"];
    $file_type = $_FILES["image"]["type"];

    $pathFileName = time()."_".$file_name;
    if($file_type == "image/jpg" || $file_type == "image/png" || $file_type == "image/jpeg"){
        if($file_size < (5000000)){
            move_uploaded_file($file_tmp_name,"uplode_images/".$pathFileName);
            $mysqli= "INSERT INTO `image`(`orignal_name`, `path_name`, `file_type`) VALUES ('$file_name','$pathFileName',$file_type)";
            $result = mysqli_query($conn,$mysqli);
        }else{
            echo"upload size should be less than 5mb";
        }
    
    }else{
        echo"only jpg and png file type allowed";
    }
}
?>


<html>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">
                <h1>File Uplode Example PHP</h1>
            </label>
            <input class="form-control" type="file" name="image" id="formFile"><br><br>
            <input type="submit">
        </div>
    </form>
    <br>
    <div>
        <h2>All Images</h2>
        <?php
    $sql = "SELECT * FROM image";
    $result = mysqli_query($conn,  $sql) or die("connection unsucessfully");
    if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($data as $row) {
                ?>
        <img src="uplode_images/<?php echo $row['path_name']; ?>" height="150px" width="150px" alt="image">
        <p>Image Name: <?php echo $row['orignal_name']; ?></p>
        <?php } }?>
    </div>
  
    
</body>
</html>