<?php

require(conf.php);

$newuser = $newpass = $confirmpass = "";
$usererror = $passerror = $confirmerror = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["$newuser"]))
      { $usererror = "Please enter a user name.";}
    else{
      $sql =