<?php
require('conf.php');
session_start(); 
$error = ''; 
if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
    }
else{
  $username2 = $_POST['username'];
  $password2 = $_POST['password'];
  
  $secret = password_hash($password2, PASSWORD_BCRYPT);
    
  $conn = mysqli_connect("$host", "$username", "$password", "$database");

// Don't use pin anymore because password hashing is a thing
//https://codeaddiction.net/articles/4/hash-and-verify-passwords-in-php---the-right-way

  $query = "SELECT username, pin from TestUsers where username=? AND pin=? LIMIT 1";  
  $stmt= $conn->prepare($query);
  $stmt->bind_param("ss", $username2, $password2);
  $stmt->execute();
  $stmt->bind_result($username2, $password2);
  $stmt->store_result();


//Change this if statement to use password verify
//Make sure all users are remade with hashed passwords

if($stmt->fetch()){
  $_SESSION['login_user'] = $username2;
  header("location: Profile.php");}
  else{
  $error = "Invalid Username or Password";}
  }
  
/*if(password_verify($secret, $whatsinthedatabase)){
  $_SESSION['login_user'] = $username2;
  header("location: Profile.php");}
  else{
  $error = "Invalid Username or Password";}
  }*/
}
?>

