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

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

//$db = new PDO($conn_string, $username, $password);
$conn = mysqli_connect("$host", "$username", "$password", "$database");
$query = "SELECT username, pin from TestUsers where username=? AND pin=? LIMIT 1";

$stmt= $conn->prepare($query);
$stmt->bind_param("ss", $username2, $password2);
$stmt->execute();
$stmt->bind_result($username2, $password2);
$stmt->store_result();

if($stmt->fetch())
$_SESSION['login_user'] = $username2;
header("location: Profile.php");

}
}
?>
 

