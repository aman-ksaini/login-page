<?php
 session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    $email = $_POST["Email"];
    $pass = $_POST["password"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mytest";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
   
    $user=mysqli_query($conn,"SELECT * FROM register WHERE email='$email' ");
     if(mysqli_num_rows($user)>0){
        $row=mysqli_fetch_assoc($user);
        if($pass==$row["password"]){
            echo "success";
            $_SESSION["myid"]=$row["Id"];
            $_SESSION["first"]=$row["first"];
            $_SESSION["last"]=$row["last"];
            $_SESSION["email"]=$row["email"];
        }
        else{
            echo "fail";
            exit;
        }
     }
}
?>