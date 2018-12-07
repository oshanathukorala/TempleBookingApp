<?php
session_start();
if(isset($_SESSION['user'])) header("Location:main.php");
 ?>

<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/styles.css" />	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
<title>Login Page</title>	
</head>
<body>
	
 <div class="login-controls">
    <h3>Login <i class="Medium material-icons left">dashboard</i> </h3>
	 <?php if(@$_GET['err'] == 1) { ?>
      <div class="data-error">Login incorrect. Please try again</div>
    <?php } ?>
	  
<div class="row">
    <form class="col s12" action="index.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input id="username" type="text" name="user" class="validate">
          <label for="username">UserName</label>
        </div>
		</div>  
        <div class="row">
          <div class="input-field col s12">
          <input id="password" type="password" name="pass" class="validate">
          <label for="password">Password</label>
         </div>
      </div>

  <button class="btn waves-effect waves-light" type="submit" name="op" value="login">Login
    <i class="material-icons left">home</i>
  </button>
    </form>
  </div>
	  

  <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>

</html>