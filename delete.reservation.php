<?php

require_once('Reservation.model.inc.php');

$Reservation= new RerservationModel();

$BookingID = intval($_GET['bookingID']);

$Reservation->delete_reservation_by_ID($BookingID);

 ?>
