<?php
require_once('user.model.inc.php');
require_once('user.controller.inc.php');


@$op = $_REQUEST['op'];

$user_controller =new UserController();

switch ($op) {
  case 'login':
    $username = $_POST['user'];
    $password = $_POST['pass'];

    if($user_controller->login($username, $password)) {
           header("Location:main.php?user=".$_POST['user']);
    }else {
           header("Location:login.php?err=1");
    }
   break;

    case 'logout':
         $user_controller->logout();
         header("Location:login.php");
    break;

    case 'signup':
         $username = $_POST['user'];
         $password = $_POST['pass'];
         $rpassword = $_POST['rpass'];
         $email    = $_POST['email'];

        $user_controller->create($username,$password, $rpassword, $email);
        header("Location:main.php");
     break;

  default:
        header("Location:login.php");
  break;
}

?>
