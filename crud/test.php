<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "practice") or die("not connected");
    $query = "SELECT * FROM student";
    $fire = mysqli_query($conn, $query) or die("Con not featched data from datbase  " . mysqli_error($conn));
    // if($fire){
    //     echo "we got the data form database";
    // }
    // echo mysqli_num_rows($fire);
    if (mysqli_num_rows($fire) > 0) {
        $user = mysqli_fetch_all($fire, MYSQLI_ASSOC);
        foreach ($user as $row) {
    ?>

            <table cellpadding="7px">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Class</th>
                    <th>Phone</th>
                    <th>Action</th>
                </thead>
                <tbody>

                    <tr>
                        <td><?php echo $row["Sid"]; ?></td>
                        <td><?php echo $row["Sname"]; ?></td>
                        <td><?php echo $row["Saddress"]; ?></td>
                        <td><?php echo $row["Sclass"]; ?></td>
                        <td><?php echo $row["Sphone"]; ?></td>
                        <td>
                            <a href='edit.php'>Edit</a>
                            <a href='delete-inline.php'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
</div>
</div>
</body>

</html>