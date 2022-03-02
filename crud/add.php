<?php include 'header.php';
include 'conn.php';
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "practice")  or die("connection failed");
if (isset($_POST["submit"])) {
    if (($_POST["sname"] == "") || ($_POST["saddress"] == "") || ($_POST["sclass"] == "") || ($_POST["sphone"] == "")) {
        echo "please Fill All the required data ";
    } else {
        $name = $_POST["sname"];
        $address = $_POST["saddress"];
        $class = $_POST["sclass"];
        $phone = $_POST["sphone"];
        $inst = "INSERT INTO student ( sname, saddress, sclass, sphone ) VALUE('$name', '$address', '$class', '$phone') ";
        if (mysqli_query($conn, $inst)) {
            echo "new record inserted successfully";
        } else {
            echo "enable to insert data";
        }
    }
}
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <option value="" selected disabled>Select Class</option>
                <option value="1">BCA</option>
                <option value="2">BSC</option>
                <option value="3">B.TECH</option>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" name="submit" value="Save" />
    </form>
</div>
</div>
</body>

</html>