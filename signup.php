<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
  </head>

  <body>

    <a class="btn-flat" style="position: absolute; top: 5vw; right: 3vw; border: 0; color:white; font-size: 20px;"  href="index.php?op=logout">Sign-off</a>

    <ul id="slide-out" class="side-nav fixed z-depth-4">
     <li>
       <div class="userView">
          <div class="background">
             <img src="img/photo1.png">
          </div>
          <a href="#!user"><img class="circle" src="img/avatar04.png"></a>
          <a href="#!name"><span class="white-text name">Welcome back,</span></a>
          <a href="#!email"><span class="white-text email"><?php echo $user; ?></span></a>
       </div>
      </li>

      <li><a class="active" href="#"><i class="material-icons pink-item">dashboard</i>Admin Panel</a></li>
      <li><div class="divider"></div></li>

      <li><a class="subheader">Management</a></li>
      <li><a href="names.html"><i class="material-icons pink-item">book</i>Reservation management</a></li>
      <li><a href="names.html"><i class="material-icons pink-item">book</i>Room management</a></li>
      <li><a href="names.html"><i class="material-icons pink-item">hotel</i>Make a Booking</a></li>
       <li><a href="signup.php"><i class="material-icons pink-item">person_add</i>Add User</a></li>
      </ul>
    <main>
    <section class="content">
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Add User </h1></div>

 <div class="login-controls" id="signup">
      <?php if(@$_GET['error'] == 'emptyfields') { ?>
        <div class="data-error red-text"><h5>Please fill all fields</h5></div>
        <?php } ?>
     <?php if(@$_GET['error'] == 'invalidEmail') { ?>
        <div class="data-error red-text"><h5>Enter valid email</h5></div>
        <?php } ?>
     <?php if(@$_GET['error'] == 'invalidun') { ?>
        <div class="data-error red-text"><h5>Username should contain only numbers and letters</h5></div>
        <?php } ?>
     <?php if(@$_GET['error'] == 'passwordMismatch') { ?>
        <div class="data-error red-text"><h5>Passwords do not match</h5></div>
        <?php } ?>
     <?php if(@$_GET['error'] == 'userexist') { ?>
        <div class="data-error red-text"><h5>Username or Email address already exist</h5></div>
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

     <button class="btn darken-4 waves-effect waves-light" type="submit" name="op" value="signup">Add User
            <i class="material-icons left">person_add</i>
         </button>

        </form>
    </div>
  </div>

    </section>
    </main>
    <footer class="page-footer">
              <div class="footer-copyright">
                <div class="container">
                  © 2018 Waharaka Designs.
                </div>
              </div>
    </footer>

    <!-- So this is basically a hack, until I come up with a better solution. autocomplete is overridden
    in the materialize js file & I don't want that.
    -->
    <!-- Yo dawg, I heard you like hacks. So I hacked your hack. (moved the sidenav js up so it actually works) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
    // Hide sideNav
    $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
      });
      $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
      });
      $('select').material_select();
      $('.collapsible').collapsible();
      </script>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </body>
</html>
