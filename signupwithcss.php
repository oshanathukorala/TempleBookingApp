<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Signup Page</title>

<style>
     #signup-controls{
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
  <div id="signup-controls">
    <h2>Signup</h2>
	  
	  
	  <?php if(@$_GET['error'] == 'emptyfields') { ?>
      <div class="error-text">Please fill all fields</div>
      <?php } ?>
	  <?php if(@$_GET['error'] == 'invalidEmail') { ?>
      <div class="error-text">Enter valid email</div>
      <?php } ?>
	  <?php if(@$_GET['error'] == 'invalidun') { ?>
      <div class="error-text">Username should contain only numbers and letters</div>
      <?php } ?>
	  <?php if(@$_GET['error'] == 'passwordMismatch') { ?>
      <div class="error-text">Passwords do not match</div>
      <?php } ?>
	  <?php if(@$_GET['error'] == 'userexist') { ?>
      <div class="error-text">Username or Email address already exist</div>
      <?php } ?>
           
	  
	  
	  <form action="index.php" method="post">	
       <p>Username:<br/>
	         <?php if(@$_GET['error'] == 'emptyfields'|| @$_GET['error'] == 'invalidEmail'||@$_GET['error'] == 'passwordMismatch') { ?>
                 <input type="text" name="user" value="<?php echo @$_GET['uid'];?>"/>
             <?php }else{ ?>		  
                 <input type="text" name="user" />
	         <?php } ?>		  		  
      </p>
      <p>Password:<br/>
      		<input type="password" name="pass" />
      </p>
      <p>Confirm Password:<br/>
      		<input type="password" name="rpass" />
      </p>
      <p>Email:<br/>
			  <?php if(@$_GET['error'] == 'emptyfields'|| @$_GET['error'] == 'invalidun'||@$_GET['error'] == 'passwordMismatch') { ?>
			  <input type="email" name="email" value="<?php echo @$_GET['email'];?>"/>
			  <?php }else{ ?>		  
			  <input type="email" name="email"/>
			  <?php } ?>	  
      </p>
      		  <input type="submit" name="op" value="signup">
      </form>
  </div>
  </body>
</html>
