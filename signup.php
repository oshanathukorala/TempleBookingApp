<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Signup Page</title>
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/styles.css" />	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	
</head>
  <body>
  <div class="login-controls" id="signup">
    <h2>Add User<i class="Medium material-icons left">business_center</i></h2>
	  
	  <?php if(@$_GET['error'] == 'emptyfields') { ?>
      <div class="data-error">Please fill all fields</div>
      <?php } ?>
	  <?php if(@$_GET['error'] == 'invalidEmail') { ?>
      <div class="data-error">Enter valid email</div>
      <?php } ?>
	  <?php if(@$_GET['error'] == 'invalidun') { ?>
      <div class="data-error">Username should contain only numbers and letters</div>
      <?php } ?>
	  <?php if(@$_GET['error'] == 'passwordMismatch') { ?>
      <div class="data-error">Passwords do not match</div>
      <?php } ?>
	  <?php if(@$_GET['error'] == 'userexist') { ?>
      <div class="data-error">Username or Email address already exist</div>
      <?php } ?>
           
   <div class="row">
    <form class="col s12" action="index.php" method="post">
      <div class="row">
        <div class="input-field col s12">
			 <?php if(@$_GET['error'] == 'emptyfields'|| @$_GET['error'] == 'invalidEmail'||@$_GET['error'] == 'passwordMismatch') { ?>
                 <input id="username" type="text" name="user" value="<?php echo @$_GET['uid'];?>" class="validate"/>
             <?php }else{ ?>		  
                 <input id="username" type="text" name="user" class="validate">
	         <?php } ?>
          <label for="username">Username</label>
        </div>
		</div> 
      
	  <div class="row">
          <div class="input-field col s12">
          <input id="password" type="password" name="pass" class="validate">
          <label for="password">Password</label>
         </div>
      </div>
	  
	  <div class="row">
          <div class="input-field col s12">
          <input id="rpassword" type="password" name="rpass" class="validate">
          <label for="password">Confirm Password</label>
         </div>
      </div>	
		
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
          <span class="helper-text" data-error="wrong" data-success="right">E.g. test@gmail.com</span>
        </div>
      </div>

		<button class="btn waves-effect waves-light" type="submit" name="op" value="signup">Sign-up
          <i class="material-icons left">person_add</i>
       </button>
		
      </form>
  </div>
	  
  <script type="text/javascript" src="js/materialize.min.js"></script>	  
  </body>
</html>
	
