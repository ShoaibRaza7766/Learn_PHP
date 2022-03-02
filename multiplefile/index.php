<?php
include 'conn.php';
if (isset($_POST["submit"])) {

    for ($i = 0; $i < count($_FILES['doc']['tmp_name']); $i++) {

        $rand = rand("11111111", "99999999");
        $file = $rand . '_' .  $_FILES['doc']['name'][$i];

            $file_name =  $_FILES['doc']['name'][$i];
            $file_size =  $_FILES['doc']['size'][$i];
            $file_tmp_name =  $_FILES['doc']['tmp_name'][$i];
            $file_type =  $_FILES['doc']['type'][$i];
            $pathFileName = time() . "_" . $file_name[0];

            if ($file_type == "image/jpg" || $file_type == "image/png" || $file_type == "image/jpeg" || $file_type == "video/mp4") {
                if($file_size < (10000000)){
                move_uploaded_file($file_tmp_name, "media/" . $pathFileName);
                $mysqli = "INSERT INTO `multifile`(`name`, `path_name`, `type`) VALUES ('$file_name','$pathFileName','$file_type')";
                $result = mysqli_query($conn, $mysqli);

            }else{
                echo"upload size should be less than 10mb";
            }
    }else{
        echo"only jpg,mp4 and png file type allowed";
}
    }
}
?>
<html>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="doc[]" multiple>
        <input type="submit" name="submit">
    </form>
    <br>

    <div>
        <h2>all multiple files</h2>
        <?php
    $sql = "SELECT * FROM multifile";
    $result = mysqli_query($conn,  $sql) or die("connection unsucessfully");
    if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($data as $row) {
                
                if($row['type'] == "image/jpg" || $row['type'] == "image/png" || $row['type'] == "image/jpeg"){ ?>
        <img src="media/<?php echo $row['path_name']; ?>" height="150px" width="150px" alt="image">
        <p>Image Name: <?php echo $row['name']; ?></p>
               <?php }else{ ?>
                    <video width="320" height="240" controls>
                        <source src="media/<?php echo $row['path_name']; ?>" type="video/mp4">
                    </video>
                    <p>video Name: <?php echo $row['name']; ?></p>
        <?php } } }?>
    </div>

</body>

</html>