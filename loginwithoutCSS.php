<?php
session_start();
if(isset($_SESSION['user'])) header("Location:main.php");
 ?>

<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Login Page</title>
<style>
     #login-controls{
           margin:0 auto;
           border:1px solid #ccc;
           padding: 50px;
           width: 300px;
     }

     .error-text{
        color: #f00;
     }

</style>
</head>
<body>

  <div id="login-controls">
    <h2>Login</h2>
    <?php if(@$_GET['err'] == 1) { ?>
      <div class="error-text">Login incorrect. Please try again</div>
    <?php } ?>
    <form action="index.php" method="post">
      <p>Username:<br/>
      <input type="text" name="user" />
      </p>
      <p>Password:<br/>
      <input type="password" name="pass" />
      </p>
      <input type="submit" name="op" value="login">
    </form>
  </div>

  </body>
</html>
