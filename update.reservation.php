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

if($q == "1"){
  $booking_id = intval($_GET['id']);
  $Reservation = new RerservationModel();
  $cReservation = $Reservation->get_reservation_by_ID($booking_id);

}

if($q == "2"){

  $cust_id = intval($_GET['id']);
  $cmodel = new CustomerModel();
  $customer = $cmodel->get_customer_by_ID($cust_id);
  ?>
  <form class="col s12" action="index.php" method="post">
    <div class="row">
      <div class="input-field col s6">
        <input value="<?php echo $customer['first_name'] ?>" id="first_name2" type="text" class="validate">
        <label class="active" for="first_name2">First Name</label>
      </div>
      <div class="input-field col s6">
        <input value="<?php echo $customer['last_name'] ?>" id="last_name2" type="text" class="validate">
        <label class="active" for="last_name2">Last Name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input value="<?php echo $customer['email'] ?>" id="email" type="text" class="validate">
        <label class="active" for="email">Email</label>
      </div>
      <div class="input-field col s6">
        <input value="<?php echo $customer['telephone_no'] ?>" id="first_name2" type="text" class="validate">
        <label class="active" for="last_name2">Telephone</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input value="<?php echo $customer['add_line1'] ?>" id="add_line1" type="text" class="validate">
        <label class="active" for="add_line1">Add line1</label>
      </div>
      <div class="input-field col s6">
        <input value="<?php echo $customer['add_line2'] ?>" id="add_line2" type="text" class="validate">
        <label class="active" for="add_line2">Add line2</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input value="<?php echo $customer['city'] ?>" id="city" type="text" class="validate">
        <label class="active" for="city">City</label>
      </div>
      <div class="input-field col s6">
        <input value="<?php echo $customer['state'] ?>" id="postcode" type="text" class="validate">
        <label class="active" for="state">State</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input value="<?php echo $customer['postcode'] ?>" id="postcode" type="text" class="validate">
        <label class="active" for="postcode">Postcode</label>
      </div>
      <div class="input-field col s6">
        <input value="<?php echo $customer['country'] ?>" id="postcode" type="text" class="validate">
        <label class="active" for="country">Country</label>
      </div>
    </div>

    <button class="btn darken-4 waves-effect waves-light" type="submit" name="op" value="signup">Edit Customer
      <i class="material-icons left">person_add</i>
    </button>
  </form>

  <?php
}

?>

</html>
