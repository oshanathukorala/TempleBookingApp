<?php

require_once('Reservation.model.inc.php');

$Reservation= new RerservationModel();

$LWcount = $Reservation->get_reservation_count_by_condition('DATEDIFF(NOW(), booking_date) <= 7');
$PPcount = $Reservation->get_reservation_count_by_condition("payment_status like 'pend%'");
$PBcount = $Reservation->get_reservationby_condition("payment_status like 'conf%'");

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
	  
<!-- Side navigation-->	  
    <ul id="slide-out" class="side-nav fixed z-depth-4">
       <li>
          <div class="userView">
            <div class="background">
             <img src="img/photo1.png">
          </div>
            <a href="#!user"><img class="circle" src="img/avatar04.png"></a>
            <a href="#!name"><span class="white-text name">Welcome back,</span></a>
            <a href="#!email"><span class="white-text email"><?php echo @$_GET['user']; ?></span></a>
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
      <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Admin Panel </h1></div>
     
		
<!-- Stat Boxes -->
      <div class="row">
        <div class="col l4 m4 s12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($LWcount);  ?></h3>
              <p>New Bookings in Last 7 days</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-globe"></i>
            </div>
            <a href="#" class="small-box-footer btn1" class="animsition-link" type=button id="choose" value="1" onClick="showUser('1')">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          </div><!-- ./col -->
          <div class="col l4 m4 s12">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo count($PPcount);  ?></h3>
                <p>Bookings with Pending Payment</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-cancel"></i>
              </div>
              <a href="#" class="small-box-footer btn2" class="animsition-link" type=button id="choose" value="opt2" onClick="showUser('2')">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div><!-- ./col -->
            <div class="col l4 m4 s12">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo count($PBcount);  ?></h3>
                  <p>Paid Bookings</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-checkmark-circle"></i>
                </div>
                <a href="#" class="small-box-footer btn3" class="animsition-link" type=button id="choose" value="opt3" onClick="showUser('3')">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              </div><!-- ./col -->

		  <!-- div to insert booking table -->
		  <div id="txtHint"></div>
		  
		  </div>  
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
			console.log(this.readyState+this.status);
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
		console.log("getReservation.php?q="+str);
        xmlhttp.open("GET","getReservation.php?q="+str,true);
        xmlhttp.send();
    }
}
		
</script>

</body>
    </html>
