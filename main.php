<?php

require_once('user.model.inc.php');
session_start();

if(!isset($_SESSION['user'])){
  header("Location: login.php");
}else{
  $user = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Main Page</title>
  </head>
  <body>
    <p>
       You are now logged in <?php print $user->get_username() ?>
       ...this is the main.
       <a href="index.php?op=logout">Logout</a>
    </p>

  </body>
</html>
