<?php
include 'Header.php';

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
<script src="js/mdl-jquery-modal-dialog.js"></script>
<script src="js/custom.js"></script>


<?php include 'Footer.php'; ?>
