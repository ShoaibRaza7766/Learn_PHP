<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
        <?php
        if(isset($_POST["showbtn"])){
         $conn = mysqli_connect("localhost", "root", "", "practice")  or die("connection failed");
         $stu_id = $_POST['sid'];
         $sql = "SELECT * FROM student WHERE sid =  {$stu_id} ";
         $result = mysqli_query($conn,  $sql) or die("connection unsucessfully");
         if (mysqli_num_rows($result) > 0) {
             $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
             foreach ($data as $row) {
         ?>
    <form class="post-form" action="updatadata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid" value="<?php echo $row['Sid'] ?>" />
            <input type="text" name="sname" value="<?php echo $row['Sname'] ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['Saddress'] ?>" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <?php
                    $sql1 = "SELECT * FROM class";
                    $result1 = mysqli_query($conn,  $sql1) or die("connection unsucessfully");
    if (mysqli_num_rows($result1) > 0) {
        echo ' <select name="sclass">';
        $data = mysqli_fetch_all($result1, MYSQLI_ASSOC);
        foreach ($data as $row1) {
            if( $row['Sclass']== $row['Sid']){
                $selected = "Selected";
            }else{
                $selected = "";
            }
                echo "<option value='{$row1['Cid']}'>{$row1['Cname']}</option>";
           }
                    echo"</select>";
                 }
                    ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['Sphone'] ?>" />
        </div>
        <input class="submit" type="submit" value="Update" />
    </form>
    <?php 
      }
}
  } 
?> 
</div>
</div>
</body>

</html>