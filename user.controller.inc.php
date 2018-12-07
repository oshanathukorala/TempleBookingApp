<?php
require_once('user.model.inc.php');
require_once('database.class.php');

class UserController{

  function UserController(){
  }


  function create($username, $password, $rpassword, $email){
   
	$db = new Database;
    $query = "select * from users where uidUsers='$username' or emailUsers='$email'";
    $result = $db->query($query);
    $rows = $db->fetch();

    if (empty($username) || empty($password) || empty($rpassword) || empty($email)){
             header("Location: signup.php?error=emptyfields&uid=".$username."&email=".$email);
             exit();
      }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             header("Location: signup.php?error=invalidEmail&uid=".$username);
             exit();
      }else if(!preg_match("/^[A-Za-z0-9]*$/", $username)){
             header("Location: signup.php?error=invalidun&email=".$email);
             exit();
     }else if(!($password == $rpassword)){
             header("Location: signup.php?error=passwordMismatch&uid=".$username."&email=".$email);
             exit();
     }else if(!empty($rows)){
            header("Location: signup.php?error=userexist");
             exit();
     } else {
       $hashedPwd  = password_hash($password, PASSWORD_DEFAULT);
       $query = "insert into users (uidUsers, pwdUsers, emailUsers) values ('$username', '$hashedPwd', '$email')";
       $result = $db->query($query);
    }
   }


 function login($username, $password){

       if($this->authenticate($username, $password)){
          session_start();
          $user = new UserModel($username);
          $_SESSION['user'] = $user;
          return true;
       }else{
         return false;
  }
}

  static function authenticate($u, $p){
      $authentic =false;

      $db = new Database;
      $query = "select * from users where uidUsers='$u'";
      $result = $db->query($query);
      
     if(!$result){
		  return $athentic;
	  }
	 
	  while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
	    if(password_verify($p,$row['pwdUsers'])) {$authentic = true;}	
	  }   
           return $authentic;
      }

       function logout(){
              session_start();
              session_destroy();
       }

}

 ?>
