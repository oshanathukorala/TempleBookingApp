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

  <script src="//storage.googleapis.com/code.getmdl.io/1.2.1/material.min.js"></script>
  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.2.1/material.deep_orange-amber.min.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="css/mdl-jquery-modal-dialog.css">
  <link href="css/custom.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>


<?php

require_once('Reservation.model.inc.php');
require_once('customer.model.inc.php');

$q = intval($_GET['q']);
$cmodel = new CustomerModel();

if($q == "1"){
  $booking_id = intval($_GET['id']);
  $Reservation = new RerservationModel();
  $cReservation = $Reservation->get_reservation_by_ID($booking_id);

?>

<form class="col s12" action="update.php" method="post">
  <div class="input-field col s6" style="display:none">
    <input name="bid" value="<?php echo $cReservation['booking_id']; ?>" id="disabled" type="text"  class="validate">
    <label class="active" for="disabled">Booking ID</label>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input name="checkin_date" value="<?php echo $cReservation['checkin_date']; ?>" id="checkin_date" type="date" class="validate">
      <label class="active" for="checkin_date">Check in Date</label>
    </div>
    <div class="input-field col s6">
      <input name="checkout_date" value="<?php echo $cReservation['checkout_date']; ?>" id="checkout_date" type="date" class="validate">
      <label class="active" for="checkout_date">Check out Date</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input name="rid" value="<?php echo $cReservation['room_id']; ?>" id="room_id" type="text" class="validate">
      <label class="active" for="room_id">Room ID</label>
    </div>
    <div class="input-field col s6">
      <input name="total_adult" value="<?php echo $cReservation['total_adult']; ?>" id="total_adult" type="text" class="validate">
      <label class="active" for="total_adult">Total Adults</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input name="total_children" value="<?php echo $cReservation['total_children']; ?>" id="total_children" type="text" class="validate">
      <label class="active" for="total_children">Total Children</label>
    </div>
    <div class="input-field col s6">
      <input name="special_requirement" value="<?php echo $reservations['special_requirement']; ?>" id="special_requirement" type="text" class="validate">
      <label class="active" for="special_requirement">Special Requirements</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input name="total_amount" value="<?php echo $cReservation['total_amount']; ?>" id="total_amount" type="text" class="validate">
      <label class="active" for="total_amount">Total Amount</label>
    </div>
    <div class="input-field col s6">
      <input name="deposit" value="<?php echo $cReservation['deposit']; ?>" id="deposit" type="text" class="validate">
      <label class="active" for="deposit">Deposit</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input name="payment_status" value="<?php echo $cReservation['payment_status']; ?>" id="payment_status" type="text" class="validate">
      <label class="active" for="payment_status">Payment Status</label>
    </div>
  </div>

  <button class="btn darken-4 waves-effect waves-light" type="submit" name="op" value="book_edit">Edit booking
    <i class="material-icons left">person_add</i>
  </button>
</form>

<?php
}

?>

<?php
if($q == "2"){

  $cust_id = intval($_GET['id']);
  $booking_id=intval($_GET['bid']);
  $customer = $cmodel->get_customer_by_ID($cust_id);
  ?>
  <form class="col s12" action="update.php" method="post">
    <div class="input-field col s6" style="display:none">
      <input name="bid" value="<?php echo $booking_id; ?>" id="disabled" type="text"  class="validate">
      <label class="active" for="disabled">Booking ID</label>
    </div>
    <div class="input-field col s6" style="display:none">
      <input name="cid" value="<?php echo $cust_id; ?>" id="disabled" type="text"  class="validate">
      <label class="active" for="disabled">Customer ID</label>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="fname" value="<?php echo $customer['first_name'] ?>" id="first_name2" type="text" class="validate">
        <label class="active" for="first_name2">First Name</label>
      </div>
      <div class="input-field col s6">
        <input name="lname" value="<?php echo $customer['last_name'] ?>" id="last_name2" type="text" class="validate">
        <label class="active" for="last_name2">Last Name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="email" value="<?php echo $customer['email'] ?>" id="email" type="text" class="validate">
        <label class="active" for="email">Email</label>
      </div>
      <div class="input-field col s6">
        <input  name="tel_no" value="<?php echo $customer['telephone_no'] ?>" id="telephone_no" type="text" class="validate">
        <label class="active" for="telephone_no">Telephone</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="add_line1" value="<?php echo $customer['add_line1'] ?>" id="add_line1" type="text" class="validate">
        <label class="active" for="add_line1">Add line1</label>
      </div>
      <div class="input-field col s6">
        <input name="add_line2" value="<?php echo $customer['add_line2'] ?>" id="add_line2" type="text" class="validate">
        <label class="active" for="add_line2">Add line2</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="city" value="<?php echo $customer['city'] ?>" id="city" type="text" class="validate">
        <label class="active" for="city">City</label>
      </div>
      <div class="input-field col s6">
        <input name="state" value="<?php echo $customer['state'] ?>" id="state" type="text" class="validate">
        <label class="active" for="state">State</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input name="pcode" value="<?php echo $customer['postcode'] ?>" id="postcode" type="text" class="validate">
        <label class="active" for="postcode">Postcode</label>
      </div>
      <div class="input-field col s6">
        <input name="country" value="<?php echo $customer['country'] ?>" id="country" type="text" class="validate">
        <label class="active" for="country">Country</label>
      </div>
    </div>

    <button class="btn darken-4 waves-effect waves-light" type="submit" name="op" value="cus_edit">Edit Customer
      <i class="material-icons left">person_add</i>
    </button>
  </form>

  <?php
}

?>




</html>
