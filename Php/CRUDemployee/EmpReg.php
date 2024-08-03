<!DOCTYPE html>
<html lang="en">

<head>
    <title>StdReg</title>
</head>

<body>

    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email"><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone"><br><br>

        <label for="country">Country:</label>
        <input type="text" name="country" id="country"><br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" id="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" value="Female" id="female">
        <label for="female">Female</label><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>

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
    $isValid = true;
    if (isset($_POST["submit"])) {

        if (isset($_POST["name"]) && !empty($_POST["name"]) && trim($_POST["name"]) != "") {
            $name = $_POST["name"];
            echo "Name is $name<br>";
        } else {
            echo "Name Not Valid<br>";
            $isValid = False;
        }

        if (isset($_POST["email"]) && !empty($_POST["email"]) && trim($_POST["email"]) != "") {
            $email = $_POST["email"];
            echo "Email is $email<br>";
        } else {
            echo "Email Not Valid<br>";
            $isValid = False;
        }

        if (isset($_POST["phone"]) && !empty($_POST["phone"]) && trim($_POST["phone"]) != "") {
            $phone = $_POST["phone"];
            echo "phone is $phone<br>";
        } else {
            echo "phone Not Valid<br>";
            $isValid = False;
        }

        if (isset($_POST["country"]) && !empty($_POST["country"]) && trim($_POST["country"]) != "") {
            $country = $_POST["country"];
            echo "country is $country<br>";
        } else {
            echo "country Not Valid<br>";
            $isValid = False;
        }

        if (isset($_POST["gender"]) && !empty($_POST["gender"])) {
            $gender = $_POST["gender"];
            echo "Gender is $gender<br>";
        } else {
            echo "Gender Not Valid<br>";
            $isValid = False;
        }

        if ($isValid) {
            //SQL query to inset data into the database
            $insertSQL = "INSERT INTO employee(name,email,phone,country,gender) VALUES('$name','$email','$phone','$country','$gender')";
            //Execute query
            $insertResult = mysqli_query($connect, $insertSQL);
            //show success/fail 
            echo "<br>";
            if ($insertResult) {
                echo "Data has been stored";
            } else {
                echo "Data couldnt be stored";
            }
        }
    }
    ?>
</body>

</html>