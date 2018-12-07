<!--<?php /*

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
*/?>

-->

<?php 

require_once('user.model.inc.php');
session_start();

if(!isset($_SESSION['user'])){
  header("Location: login.php");
}else{
  $user = $_SESSION['user'];
}


require_once('Reservation.model.inc.php');

$Reservation =new RerservationModel();
$LWReservation = $Reservation->get_reservationby_condition('DATEDIFF(NOW(), booking_date) <= 7');
$PPReservation = $Reservation->get_reservationby_condition("payment_status like 'pend%'");
$PBReservation = $Reservation->get_reservationby_condition("payment_status like 'conf%'");

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
              <h3><?php echo count($LWReservation);  ?></h3>
              <p>New Bookings in Last 7 days</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-globe"></i>
            </div>
            <a href="#" class="small-box-footer btn1" class="animsition-link" type=button>More info <i class="fa fa-arrow-circle-right"></i></a>
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
              <a href="#" class="small-box-footer btn2" class="animsition-link" type=button>More info <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer btn3" class="animsition-link" type=button>More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              </div><!-- ./col -->

		  <!-- More details table for reservations for last 7 day -->
		  <div class="row myText1 hiddendiv" id="bookinginfo0" >
                <div class="custom-responsive">
				  <h4 class="center-align">Last 7 days</h4>
                  <table class="striped hover centered">
                    <thead><tr>
                      <th>Booking No.</th>
					  <th>Check In</th>
					  <th>Check Out</th>
					  <th>Room</th>
					  <th>Guests</th>
					  <th>Total Amount</th>
					  <th>Deposit</th>
					  <th>Balance</th>
					  <th>Payment Status</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php 
					  
					  $arrayLength = count($LWReservation);
                       for ($i = 1; $i <=$arrayLength; $i++) {
                        ?><tr>					 	
							  <th><?php echo $LWReservation[i]->booking_id ?></th>
							  <th><?php echo $LWReservation[i]->checkin_date ?></th>
							  <th><?php echo $LWReservation[i]->checkout_date ?></th>
							  <th><?php echo $LWReservation[i]->room_id ?></th>
							  <th><?php echo ("Adults:".$LWReservation[i]->total_adult."Child:".$LWReservation[i]->total_children) ?></th>
					          <th><?php echo $LWReservation[i]->total_amount ?></th>
							  <th><?php echo $LWReservation[i]->deposit ?></th>	
					          <th><?php echo $LWReservation[i]->balance ?></th>
							  <th><?php echo $LWReservation[i]->payment_status ?></th>
                            </tr>
					     <?php } ?>   
                  </tbody>
                </table>
              </div>
		    </div>
		  
		     <!-- More details table for payment pending reservations -->
		     <div class="row myText2 hiddendiv" id="bookinginfo1">
		      <h4 class="center-align">Payments Pending</h4>
                <div class="custom-responsive">
                  <table class="striped hover centered">
                    <thead><tr>
                      <th>Booking No.</th>
					  <th>Check In</th>
					  <th>Check Out</th>
					  <th>Room</th>
					  <th>Guests</th>
					  <th>Total Amount</th>
					  <th>Deposit</th>
					  <th>Balance</th>
					  <th>Payment Status</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php 
					  
					  $arrayLength = count($PPReservation);
                       for ($i = 1; $i <=$arrayLength; $i++) {
                        ?><tr>					 	
							  <th><?php echo $PPReservation[i]->booking_id ?></th>
							  <th><?php echo $PPReservation[i]->checkin_date ?></th>
							  <th><?php echo $PPReservation[i]->checkout_date ?></th>
							  <th><?php echo $PPReservation[i]->room_id ?></th>
							  <th><?php echo ("Adults:".$PPReservation[i]->total_adult."Child:".$PPReservation[i]->total_children) ?></th>
					          <th><?php echo $PPReservation[i]->total_amount ?></th>
							  <th><?php echo $PPReservation[i]->deposit ?></th>	
					          <th><?php echo $PPReservation[i]->balance ?></th>
							  <th><?php echo $PPReservation[i]->payment_status ?></th>
                            </tr>
					     <?php } ?>
					   
                  </tbody>
                </table>
              </div>
		      </div>
		  
		  <!-- More details table for fully paid reservations -->
		    <div class="row myText3 hiddendiv" id="bookinginfo2">
		      <h4 class="center-align">Paid in Full</h4>
                <div class="custom-responsive">
                  <table class="striped hover centered">
                    <thead><tr>
                      <th>Booking No.</th>
					  <th>Check In</th>
					  <th>Check Out</th>
					  <th>Room</th>
					  <th>Guests</th>
					  <th>Total Amount</th>
					  <th>Deposit</th>
					  <th>Balance</th>
					  <th>Payment Status</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php 
					  
					  $arrayLength = count($PBReservation);
                       for ($i = 1; $i <=$arrayLength; $i++) {
                        ?><tr>					 	
							  <th><?php echo $PBReservation[i]->booking_id ?></th>
							  <th><?php echo $PBReservation[i]->checkin_date ?></th>
							  <th><?php echo $PBReservation[i]->checkout_date ?></th>
							  <th><?php echo $PBReservation[i]->room_id ?></th>
							  <th><?php echo ("Adults:".$PBReservation[i]->total_adult."Child:".$PBReservation[i]->total_children) ?></th>
					          <th><?php echo $PBReservation[i]->total_amount ?></th>
							  <th><?php echo $PBReservation[i]->deposit ?></th>	
					          <th><?php echo $PBReservation[i]->balance ?></th>
							  <th><?php echo $PBReservation[i]->payment_status ?></th>
                            </tr>
					     <?php } ?>
					   
                  </tbody>
                </table>
              </div>
		    </div>
		  
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
	   $(".btn1").click(function() {
                  $(".myText1").toggle();
		          $(".myText2").hide();
		          $(".myText3").hide(); 
        });
		
	   $(".btn2").click(function() {
                  $(".myText2").toggle();  
		          $(".myText1").hide();
		          $(".myText3").hide();
        });
		
	    $(".btn3").click(function() {
                  $(".myText3").toggle(); 
			      $(".myText1").hide();
		          $(".myText2").hide();
        });
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
