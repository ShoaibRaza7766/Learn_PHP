<?php
 include 'dbsconnection.php';
if(isset($_FILES["file"])){
    $file_name = $_FILES["file"]["name"];
    $file_size = $_FILES["file"]["size"];
    $file_tmp_name = $_FILES["file"]["tmp_name"];
    $file_type = $_FILES["file"]["type"];

    $pathFileName = time()."_".$file_name;
    if($file_type == "image/jpg" || $file_type == "image/png" || $file_type == "image/jpeg" || $file_type == "video/mp4"){
        if($file_size < (10000000)){
            move_uploaded_file($file_tmp_name,"uplode_vidimg/".$pathFileName);
            $mysqli= "INSERT INTO `imgvid`(`orignial_name`, `path_name`, `file_type`) VALUES ('$file_name','$pathFileName', '$file_type')";
            echo $mysqli;
            $result = mysqli_query($conn,$mysqli);
            echo $result;
        }else{
            echo"upload size should be less than 5mb";
        }
    
    }else{
        echo"only jpg,mp4 and png file type allowed";
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
            <input class="form-control" type="file" name="file" id="formFile"><br><br>
            <input type="submit">
        </div>
    </form>
    <br>
    <div>
        <h2>All Images and videos</h2>
        <?php
    $sql = "SELECT * FROM imgvid";
    $result = mysqli_query($conn,  $sql) or die("connection unsucessfully");
    if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($data as $row) {
                
                if($row['file_type'] == "image/jpg" || $row['file_type'] == "image/png" || $row['file_type'] == "image/jpeg"){ ?>
        <img src="uplode_vidimg/<?php echo $row['path_name']; ?>" height="150px" width="150px" alt="image">
        <p>Image Name: <?php echo $row['orignial_name']; ?></p>
               <?php }else{ ?>
                    <video width="320" height="240" controls>
                        <source src="uplode_vidimg/<?php echo $row['path_name']; ?>" type="video/mp4">
                    </video>
                    <p>video Name: <?php echo $row['orignial_name']; ?></p>
        <?php } } }?>
    </div>
  
    
</body>
</html>