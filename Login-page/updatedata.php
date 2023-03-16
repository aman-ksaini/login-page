<?php
echo "hi";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID=$_SESSION["myid"];
    echo $ID;
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

    $sql = "UPDATE register SET first='$first' , last='$last' , email='$email' , password='$pass'  WHERE Id= $ID ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
?>