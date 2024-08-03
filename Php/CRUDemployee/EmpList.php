<?php
//connect to sql
$connect = mysqli_connect('localhost', 'root', '', 'orchid');

//check the connection
if (!$connect) {
    die('Database no connection');
} else {
    echo 'Database yes connection';
}
echo "<br><br>";

$fetchSql = 'SELECT * from employee';
$fetchResult = mysqli_query($connect, $fetchSql);

?>
<table border="1" style="border-collapse: collapse;">
    <tr>
        <th> ID</th>
        <th> Name</th>
        <th> Email</th>
        <th> Phone</th>
        <th> Country</th>
        <th> Gender</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_array($fetchResult)) { ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['country'] ?></td>
            <td><?php echo $row['gender'] ?></td>

            <td>
                <button>
                    <a href="updateEmp.php?id=<?php echo $row["id"]; ?>" target="_blank">
                        Edit</a>
                </button>
                <button>
                    <a href="deleteEmp.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Sacchi Delete hanne?')" target="_blank">
                        Delete</a>
                </button>
            </td>
        </tr>
    <?php } ?>
</table>