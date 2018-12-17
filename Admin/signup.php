<?php include 'Header.php'; ?>


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




    <!-- Footer starts here-->

<?php include 'Footer.php' ?>
