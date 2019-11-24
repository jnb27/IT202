<?php 
    session_start();
    ini_set('display_errors',1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $error = ''; 
?>

<html>
<head>
<title>Login Form Milestone</title>
<link href="style2.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="login">
<h2> Login </h2>
<form action = "" method="post">
<label>Username: </label>
<input id="name" name="username" placeholder="Username" type="text">
<label>Password: </label>
<input id="password" name="password" placeholder="Enter Password" type="password">
<br></br>
<input name="submit" type="submit" value="Login">
<span><?php echo $error; ?></span>
</form>
</div>
</body>
</html>

<?php
      require('conf.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['username']) || empty($_POST['password'])) {
          $error = "Username or Password is invalid";
          }
      if(isset($_POST['username']) && isset($_POST['password'])){
      
        $loginUser = $_POST['username'];
        $loginPass = $_POST['password'];
        
        try{
              $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			        $db = new PDO($conn_string, $username, $password);
              $stmt = $db->prepare("SELECT Username, Password FROM BotUsers where Username = :username LIMIT 1");
              $stmt -> execute(array(":username"=>$loginUser));
              
              $results = $stmt->fetch(PDO::FETCH_ASSOC);
              
              if($results && count($results) > 0){
                  //$hashedPassword = password_hash($loginPass, PASSWORD_BCRYPT);
                  if(password_verify($loginPass, $results['Password'])){
                  
                  $_SESSION['login_user'] = $loginUser;
                  header("location: Profile.php");}
              else{
                  $error = "Invalid Username or Password";}
                  }
           }
        catch(Exception $e)
          {
            echo $e->getMessage();
          }
                  
                  }
                  }
                  
?>