<?php
include 'header.php';
include 'conn.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    $sql = "SELECT student.Sid,student.Sname,student.Saddress,class.Cname,student.Sphone FROM student jOIN class WHERE student.Sclass = class.Cid";
    $result = mysqli_query($conn,  $sql) or die("connection unsucessfully");
    if (mysqli_num_rows($result) > 0) {
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
                <?php
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($data as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['Sid']; ?></td>
                        <td><?php echo $row['Sname']; ?></td>
                        <td><?php echo $row['Saddress']; ?></td>
                        <td><?php echo $row['Cname']; ?></td>
                        <td><?php echo $row['Sphone']; ?></td>
                        <td>
                            <a href='edit.php ?id=<?php echo $row['Sid'];?>'>Edit</a>
                            <a href='delete-inline.php ?id=<?php echo $row['Sid'];?>'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
        </table>
    <?php } ?>
</div>
</div>
</body>

</html>