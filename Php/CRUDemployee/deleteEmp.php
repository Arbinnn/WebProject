<?php
$sid = $_GET["id"];

$connection = mysqli_connect('localhost', 'root', '', 'orchid');

if (!$connection) {
    die('Database no connection');
} else {
    echo 'Database yes connection';
}
echo "<br><br>";
$deleteSQL = "DELETE from employee where id=$sid";

$deleteResult = mysqli_query($connection, $deleteSQL);

if ($deleteResult) {
    echo "Data has been deleted";
} else {
    echo "Data couldnt be deleted, Try again";
}
