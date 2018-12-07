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
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">// User Details </h1></div>
      <div class="container">
        <h3>Account Information</h3>
        <br>
        <form id="user">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td><label for="usrname">Account ID: </label></td>
                <td><a>DwightSchrute</a></td>
              </tr>
              <tr>
                <td><label for="djoined">Date Joined: </label></td><td><a>01-11-2005</a></td>
              </tr>
              <tr>
                <td><label for="ipaddress">Last IP Address: </label></td>
                <td><a>127.0.0.1</a></td>
              </tr>
              <tr>
                <td><label for="econfirm">Email Confirmed: </label></td>
                <td><i class="material-icons">check</i></a></td>
              </tr>
              <tr>
                <td><label for="guidelines">Guidelines Approved: </label></td>
                <td><i class="material-icons">check</i></a></td>
              </tr>
              <tr>
                <input type="hidden" name="pastdata" value="{{ usr.id }}" />
                <td><label for="usrname">Username: </label></td>
                <td><input type="text" name="usrname" value="DwightSchrute" /></td>
              </tr>
              <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="text" name="email" value="dwight@dundermifflin.com" /></td>
              </tr>
              <tr>
                <td><label for="accesslevel">Access Level: </label></td>
                <td><input type="text" name="accesslevel" value="Assistant To The Regional Manager" /></td>
              </tr>
              <tr>
                <td><label for="email">Account Actions: </label></td>
                <td>
                  <div class="btn-toolbar">
                    <a href="#" class="btn btn-danger">Kick</a>
                    <a href="#" class="btn btn-warning">Message</a>
                    <a href="#" class="btn btn-success">Chat Logs</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <br>
          <div class="center-align"><input class="btn btn-success" type="submit" value="Submit" /></div>
        </form>
        <br><br>
        <h2>DwightKSchrute's Account History</h2><br>
        <table class="striped hover">
          <thead>
            <tr>
              <th>Action</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Got into work</td>
              <td>6:40AM</td>
            </tr>
            <tr>
              <td>Watered plant</td>
              <td>6:51AM</td>
            </tr>
            <tr>
              <td>Rearranged Michael's toys</td>
              <td>7:14AM</td>
            </tr>
            <tr>
              <td>Made coffee</td>
              <td>9:20AM</td>
            </tr>
            <tr>
              <td>Made sale - $512 worth of premium letterstock</td>
              <td>12:31PM</td>
            </tr>
          </tbody>
        </table>
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
