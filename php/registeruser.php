<?php

$servername = "localhost";
$susername = "root";
$spassword = "";
$dbname = "blog";

$username= $_POST["name"];
$password = $_POST["password"];
$email =$_POST["email"];

// Create connection
$conn = new mysqli($servername, $susername, $spassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// insert data into table
$sqlcheck = "SELECT * from users where email= '$email' AND password = '$password'";


if ($conn->query($sqlcheck)->num_rows == 0) {
  $sql = "INSERT INTO users (name,email, password)
VALUES ('$username', '$email', '$password')";
  $conn->query($sql);
  echo "New record created successfully";
  $conn->close();
} else {
  echo "User already exists ";
  $conn->close();
  header("Location: http://localhost/blogsite/login.html"); exit;
}


$conn->close();

