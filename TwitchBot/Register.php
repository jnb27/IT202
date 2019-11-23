<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
       require('conf.php');
  
      if(isset($_POST['register'])){
          
          if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm']) && !empty($_POST['email']) ){
          
          $newUser = $_POST['username'];
          $newPass = $_POST['password'];
          $confpass = $_POST['confirm'];
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
               $sql =  "SELECT Username FROM BotUsers WHERE Username = :username LIMIT 1";
               $stmt = $db->prepare($sql);
               
               $stmt->execute(array(':username' => $newUser));
               
               //Ideally this should return true or false
               $results = $stmt->fetchColumn();
               
               //If this fires then it means our check is working
               if($results)
               {echo 'User taken'; 
                 exit();}
               
               
               //Otherwise insert into the database
               $hash = password_hash($confpass, PASSWORD_BCRYPT);
               
               $sql = "INSERT INTO 'BotUsers' (Username, Password, Email, Coins) VALUES (:username, :password, :email, 100)";
               $stmt = $db->prepare($sql);
               
               $result = $stmt->execute(array(':username' => $newUser, ':password' => $hash, ':email' => $email));
               
                if($result)
                {echo 'Successful Login';}
          
            }
          
              }
              else{
              echo 'Fill in all fields';}
              
          }
       

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="Register.php" method="post">
            
            <label for="username">Username</label>
            <input type="text" id="username" name="username"><br>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email"><br>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password"><br>
            
            <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" name="Confirm Password">
           
            <input type="submit" name="register" value="Register"></button>
        
        </form>
    </body>
</html>


