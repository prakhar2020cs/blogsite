<?php

// server details
$servername = "localhost";
$susername = "root";
$spassword = "";
$dbname = "blog";

//login details
$email = $_POST['email'];
$password = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $susername, $spassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "connected<br>";
//validate user

$sql = "SELECT  name, email, password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  //loginto blog list

  echo "logged in      <br>";

  session_start();
  $_SESSION["email"] = $email;
  $_SESSION["password"] = $password;
  echo session_id();

  echo "session start";
  // remove all session variables

  echo $_SESSION['email'];
  $conn->close();
  // session_unset();
  // session_destroy();

  // header("Location: http://localhost/blogsite/php/edit.php");
  exit();
  
  // echo "hello";

  // destroy the session


} else {
  echo "Register the user";
  $conn->close();
  header("Location: http://localhost/blogsite/registration.html");

  exit();
}
// $conn->close();
// echo "validated";