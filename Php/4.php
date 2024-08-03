<?php

$connection = mysqli_connect('localhost', 'root', '', '[write your data base name here)');

if (!$connection) {
    die('Database no connection');
} else {
    echo 'Database yes connection';
}

// Create a database
$dbname = 'my_database'; // Replace 'my_database' with your desired database name
$sql = "CREATE DATABASE $dbname";

if (mysqli_query($connection, $sql)) {
    echo "Database '$dbname' created successfully";
} else {
    echo "Error creating database: " . mysqli_error($connection);
}

// Close the connection
mysqli_close($connection);
