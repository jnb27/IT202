<?php
require('conf.php');

//$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
//$db = new PDO($conn_string, $username, $password);

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("$host", "$username", "$password", "$database");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT username from TestUsers where username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
?>

