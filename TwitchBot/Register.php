<?php
      session_start();
      require(conf.php);
  
      if(isset($_POST['register'])){
          
          if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm']) ){
          
          $newUser = $_POST(['username']);
          $newPass = $_POST(['password']);
          $confpass = $_POST(['confirm']);
          $email = $_POST(['email']);
          
          if($newPass === $confpass)
            {
               //Check if username exists if not, insert and hash password 
               
               $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
               $db = new PDO($conn_string, $username, $password);
               
               $sql =  "SELECT COUNT('Username') FROM 'BotUsers' WHERE 'Username' = :username LIMIT 1");
               $stmt = $db->prepare($sql);
               
               $stmt->bindParam(':username', $newUser);
               $stmt->execute();
               
               $results = $stmt->fetch(PDO::FETCH_ASSOC);++
               
               if($results > 0)
               {echo 'User taken'; 
                 exit();}
               
               $hash = password_hash($confpass, PASSWORD_BCRYPT);
               
               $aql = "INSERT INTO BotUsers (Username, Password, Email, Coins) VALUES (:username, :password, :email, 100)";
               $stmt = $db->prepare($sql);
               
               $stmt->bindParam(':username', $newUser);
               $stmt->bindParam(':password', $hash);
               $stmt->bindParam('email', $email);
               
               $result = $stmt->execute();
               
               if($result){
                   echo 'It worked';
               }
          
          
            }
          
              }
              
          }
        

?>


