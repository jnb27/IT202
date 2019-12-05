<?php 
    
    ini_set('display_errors',1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
 
?>

<?php
      require('conf.php');
      session_start();
      $error = '';
    //if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submit'])){
      if (empty($_POST['username']) || empty($_POST['password'])) 
          {
            $error = "Username or Password is invalid ";
          }
          
      else
      {
      
        $loginUser = $_POST['username'];
        $loginPass = $_POST['password'];
        
        try{
              $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			        $db = new PDO($conn_string, $username, $password);
              $stmt = $db->prepare("SELECT Username, Password FROM BotUsers where Username = :username LIMIT 1");
              $stmt -> execute(array(":username"=>$loginUser));
              
              $results = $stmt->fetch(PDO::FETCH_ASSOC);
              
              if($results && count($results) > 0){
                  
                    if(password_verify($loginPass, $results['Password'])){
                    $_SESSION['login_user'] = $loginUser;
                    
                          if($results['isAdmin'] == 1)
                              {
                              $_SESSION['isAdmin'] = true;
                              header("location: Admin.php");
                              }
                    
                    header("location: Profile.php");}
                    else
                    {
                      $error = "Invalid Username or Password";
                    }
               }
               else{
                   $error = "Invalid Username or Password";
                   }
               
              
           }
           
        catch(Exception $e)
          {
            $error=$e->getMessage();
          } 
      }
                  
                  //}
   }                     
                  
                  
?>