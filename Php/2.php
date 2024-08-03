<!DOCTYPE html>
<html>

<head>
    <title>Form Example</title>
</head>

<body>
    <form action="process.php" method="post">
        Name: <input type="text" name="name"><br>
        Age: <input type="text" name="age"><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
<?php
// Collecting form data using POST method
$name = $_POST['name'];
$age = $_POST['age'];

echo "Name: " . $name . "<br>";
echo "Age: " . $age;
?>
<!-- For the GET method, you would change the method="post" in the form to method="get", and access the data using $_GET in your PHP script. -->