<?php
//get the param(id) from URL

$sid = $_GET["id"];
// echo $sid;

$connection = mysqli_connect('localhost', 'root', '', 'orchid');

if (!$connection) {
    die('Database no connection');
} else {
    echo 'Database yes connection';
}
echo "<br><br>";

$fetchSql = "SELECT * from employee where id=$sid";
$fetchResult = mysqli_query($connection, $fetchSql);

$emp = mysqli_fetch_assoc($fetchResult);
// echo $emp["name"];

$isValid = true;
if (isset($_POST["submit"])) {

    if (isset($_POST["name"]) && !empty($_POST["name"]) && trim($_POST["name"]) != "") {
        $name = $_POST["name"];
    } else {
        echo "Name Not Valid<br>";
        $isValid = False;
    }

    if (isset($_POST["email"]) && !empty($_POST["email"]) && trim($_POST["email"]) != "") {
        $email = $_POST["email"];
    } else {
        echo "Email Not Valid<br>";
        $isValid = False;
    }

    if (isset($_POST["phone"]) && !empty($_POST["phone"]) && trim($_POST["phone"]) != "") {
        $phone = $_POST["phone"];
    } else {
        echo "phone Not Valid<br>";
        $isValid = False;
    }

    if (isset($_POST["country"]) && !empty($_POST["country"]) && trim($_POST["country"]) != "") {
        $country = $_POST["country"];
    } else {
        echo "country Not Valid<br>";
        $isValid = False;
    }

    if (isset($_POST["gender"]) && !empty($_POST["gender"])) {
        $gender = $_POST["gender"];
    } else {
        echo "Gender Not Valid<br>";
        $isValid = False;
    }

    if ($isValid) {

        //SQL query to inset data into the database
        $updateSQL = "UPDATE employee SET name='$name',email='$email',phone='$phone',country='$country',gender='$gender' where id=$sid";

        //Execute query
        $UpdateResult = mysqli_query($connection, $updateSQL);

        //show success/fail 
        echo "<br>";
        if ($UpdateResult) {
            echo "Data has been updated";
            header('location:EmpList.php');
        } else {
            echo "Data couldnt be updated, Try again";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Form</title>
</head>

<body>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $emp["name"]; ?>"><br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $emp["email"]; ?>"><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $emp["phone"]; ?>"><br><br>

        <label for="country">Country:</label>
        <input type="text" name="country" id="country" value="<?php echo $emp["country"]; ?>"><br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" id="male" <?php echo $emp['gender'] == 'Male' ? 'checked' : ''; ?>>
        <label for=" male">Male</label>
        <input type="radio" name="gender" value="Female" id="female" <?php echo $emp['gender'] == 'Female' ? 'checked' : ''; ?>>
        <label for="female">Female</label><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>