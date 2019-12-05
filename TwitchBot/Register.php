<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="Register.php" method="POST">
            
            <label for="username">Username</label>
            <input type="text" id="username" name="username"><br>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email"><br>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password"><br>
            
           
            <input type="password" name="cpassword" placeholder="Confirm Password">
           
            <input type="submit" name="register" value="Register"></button>
        
        </form>
    </body>
</html>


<?php
       require('conf.php');
       require('session.php');
  
    if(isset($_SESSION['login_user']))
      {header("location: Profile.php");}
      
      if(isset($_POST['register'])){
          
          if(!empty($_POST['username'])  && !empty($_POST['password']) && !empty($_POST['cpassword']) && !empty($_POST['email']) ){
          
          $newUser = $_POST['username'];
          $newPass = $_POST['password'];
          $confpass = $_POST['cpassword'];
          $email = $_POST['email'];
          
          if($newPass === $confpass)
            {
               //If connection fails error message will be sent
               try{
               $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
               $db = new PDO($conn_string, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
               }
               catch (Exception $e){
                   echo $e->getMessage();}
                
               //try to get the username and check if it exists    
              /* $sql =  "SELECT Username FROM BotUsers WHERE Username = :username LIMIT 1";
               $stmt = $db->prepare($sql);
               
               $stmt->execute(array(':username' => $newUser));
               
               //Ideally this should return true or false
               $results = $stmt->fetchColumn();
               
               //If this fires then it means our check is working
               if($results)
               {echo 'User taken'; 
                 exit();} */
               
               try{
               //Otherwise insert into the database
               $hash = password_hash($confpass, PASSWORD_BCRYPT);
               
               $sql = "INSERT INTO BotUsers (Username, Password, Email, Coins) VALUES (:username, :password, :email, 100)";
               $stmt = $db->prepare($sql);
               
               $stmt->execute(array(':username' => $newUser, ':password' => $hash, ':email' => $email));
               
               $_SESSION['login_user'] = $newUser;
                header("location: Profile.php");
               
               }
               catch (Exception $e){
                 echo $e->getMessage();}
               
               
          
            }
          
              }
              else{
              echo 'Fill in all fields';}
              
          }
       

?>



