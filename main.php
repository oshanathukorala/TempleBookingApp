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
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/materialize.min.old.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/mdl-jquery-modal-dialog.css">


  <script src="//storage.googleapis.com/code.getmdl.io/1.2.1/material.min.js"></script>
  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.2.1/material.deep_orange-amber.min.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>

  <a class="btn-flat" style="position: absolute; top: 5vw; right: 3vw; border: 0; color:white; font-size: 20px;"  href="index.php?op=logout">Sign-off</a>

  <!-- Side navigation-->
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

<?php

require_once('Reservation.model.inc.php');

  $Reservation =new RerservationModel();

  $LWReservation = $Reservation->get_reservationby_condition('DATEDIFF(NOW(), booking_date) <= 7');
  $PPReservation = $Reservation->get_reservationby_condition("payment_status like 'pend%'");
  $PBReservation = $Reservation->get_reservationby_condition("payment_status like 'conf%'");

?>


  <main>
    <section class="content">
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Admin Panel </h1></div>


      <!-- Stat Boxes -->
      <div class="row">


        <div class="col l4 m4 s12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($LWReservation);  ?></h3>
              <p>New Bookings in Last 7 days</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-globe"></i>
            </div>
            <a href="#" class="small-box-footer btn1" class="animsition-link" type=button onClick="showUser(1)">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->


        <div class="col l4 m4 s12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($PPReservation);  ?></h3>
              <p>Bookings with Pending Payment</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cancel"></i>
            </div>
            <a href="#" class="small-box-footer btn2" class="animsition-link" type=button onClick="showUser(2)">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->



        <div class="col l4 m4 s12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count($PBReservation);  ?></h3>
              <p>Paid Bookings</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-checkmark-circle"></i>
            </div>
            <a href="#" class="small-box-footer btn3" class="animsition-link" type=button onClick="showUser(3)">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->

        <!-- More details tables-->
        <div id="txtHint"><b></b></div>


<!--debug area-->


<!--debug area ends-->


      </div>
    </section>
  </main>

  <!-- Footer starts here-->

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

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="js/mdl-jquery-modal-dialog.js"></script>



<script>

function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;

        $('.view_data').click(function () {
          var id = $(this).attr("value");
          showDialog({
            title: 'DELETE booking with ID: '+id,
            text: 'Are you sure you want to Delete this Booking?',
            negative: {
              title: 'Cancel'
            },
            positive: {
              title: 'Yes',
              onClick: function (e) {
                xmlhttp.open("POST","delete.reservation.php?bookingID="+id,true);
                xmlhttp.send();
              }
            }
          });
        });

      }
    };
    xmlhttp.open("GET","getReservation.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

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


</body>
</html>
