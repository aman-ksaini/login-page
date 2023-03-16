<?php
echo"hi";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $first = $_POST["FirstName"];
    $last = $_POST["LastName"];
    $email = $_POST["Email"];
    $pass = $_POST["Password"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mytest";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT into register(first,last,email,password) VALUES('$first','$last','$email','$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
?>