<?php 

echo('worked');
	
require_once('Reservation.model.inc.php');

$q = intval($_GET['q']);

$Reservation= new RerservationModel();
if($q == "1"){
$cReservation = $Reservation->get_reservationby_condition('DATEDIFF(NOW(), booking_date) <= 7');
}
if($q == "2"){
$cReservation = $Reservation->get_reservationby_condition("payment_status like 'pend%'");
}
if( $q =="3"){
$cReservation = $Reservation->get_reservationby_condition("payment_status like 'conf%'");	
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<div class="row jqueryOptions opt1" id="bookinginfo0" >
                <div class="custom-responsive">
				  <h4 class="center-align"><? if($q == "1") { echo "Last 7 Days";} if($q == "2") { echo "Payment Pending";}
					  if($q == "3") { echo "Fully Paid";} ?></h4>
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
					  
					  $arrayLength = count($cReservation);
                       for ($i = 1; $i <=$arrayLength; $i++) {
                        ?><tr>					 	
							  <th><?php echo $cReservation[i]->booking_id ?></th>
							  <th><?php echo $cReservation[i]->checkin_date ?></th>
							  <th><?php echo $cReservation[i]->checkout_date ?></th>
							  <th><?php echo $cReservation[i]->room_id ?></th>
							  <th><?php echo ("Adults:".$cReservation[i]->total_adult."Child:".$cReservation[i]->total_children) ?></th>
					          <th><?php echo $cReservation[i]->total_amount ?></th>
							  <th><?php echo $cReservation[i]->deposit ?></th>	
					          <th><?php echo $cReservation[i]->balance ?></th>
							  <th><?php echo $cReservation[i]->payment_status ?></th>
                            </tr>
					     <?php } ?>   
                  </tbody>
                </table>
              </div>
	</div>
	
	</body>
</html>
