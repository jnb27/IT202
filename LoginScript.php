<?php
require('conf.php');
session_start(); 
$error = ''; 
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else{

$username = $_POST['username'];
$password = $_POST['password'];

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

$db = new PDO($conn_string, $username, $password);
$query = "SELECT username, pin from TestUsers where username=? AND pin=? LIMIT 1";

$stmt= $db->prepare(query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();

if($stmt->fetch()){
$_SESSION['login_user'] = $username;
header("location: Profile.php");
}
}
}
?>
 

