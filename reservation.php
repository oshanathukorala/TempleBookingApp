<?php include 'Header.php'; ?>
<?php
require_once('Reservation.model.inc.php');
require_once('customer.model.inc.php');



$Reservation = new RerservationModel();
$booking_id = intval($_GET['booking_id']);
$cReservation = $Reservation->get_reservationby_condition("booking_id=$booking_id;");




$cmodel = new CustomerModel();
$customer = $cmodel->get_customer_by_ID($cReservation[1]->cust_id);



?>
<main>
  <section class="content">
    <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Reservation details</h1></div>

    <div class="container">
      <h3>Customer Information</h3>
      <br>
      <form id="user">
        <table class="table table-hover">
          <tbody>
            <tr>
              <td><label for="usrname">Customer ID: </label></td>
              <td><a class="grey-text"><?php echo $customer['cus_id']; ?></a></td>
            </tr>
            <tr>
              <td><label for="econfirm">First Name: </label></td>
              <td><a class="grey-text"><?php echo $customer['first_name']; ?></a></td>
            </tr>
            <tr>
              <td><label for="econfirm">Last Name: </label></td>
              <td><a class="grey-text"class="grey-text"><?php echo $customer['last_name']; ?></a></td>
            </tr>
            <tr>
              <td><label for="econfirm">Email: </label></td>
              <td><a class="grey-text"><?php echo $customer['email']; ?></a></td>
            </tr>
            <tr>
              <td><label for="econfirm">Telephone Number: </label></td>
              <td><a class="grey-text"><?php echo $customer['telephone_no']; ?></a></td>
            </tr>
            <tr>
              <tr>
                <td><label for="econfirm">Address1: </label></td>
                <td><a class="grey-text"><?php echo $customer['add_line1']."  ".$customer['add_line2']."  ".$customer['city']."  ".$customer['state']."  ".$customer['postcode']."  ".$customer['country']; ?></a></td>
              </tr>
          </tbody>
        </table>
        <br>
      </form>

      <br><br>


<h3>Reservation Details</h3><br>
      <table class="striped hover blue">
        <thead><tr>
          <th>Booking No.</th>
          <th>Check In</th>
          <th>Check Out</th>
          <th>Room</th>
          <th>Guests</th>
          <th>Special Requirement</th>
          <th>Total Amount</th>
          <th>Deposit</th>
          <th>Balance</th>
          <th>Payment Status</th>
        </tr>
      </thead>
      <tbody>
      <tr>
            <th><?php echo $cReservation[1]->booking_id ?></th>
            <th><?php echo $cReservation[1]->checkin_date ?></th>
            <th><?php echo $cReservation[1]->checkout_date ?></th>
            <th><?php echo $cReservation[1]->room_id ?></th>
            <th><?php echo ("Adults:".$cReservation[1]->total_adult."  Child:".$cReservation[1]->total_children) ?></th>
            <th><?php echo $reservations[1]->special_requirement ?></th>
            <th><?php echo $cReservation[1]->total_amount ?></th>
            <th><?php echo $cReservation[1]->deposit ?></th>
            <th><?php echo $cReservation[1]->balance ?></th>
            <th><?php echo $cReservation[1]->payment_status ?></th>
          </tr>
      </tbody>
    </table>





  </div>
</section>
</main>




<!-- Footer starts here-->

<?php include 'Footer.php' ?>
