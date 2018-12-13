<?php
require_once('Reservation.model.inc.php');
require_once('customer.model.inc.php');

@$op = $_REQUEST['op'];

$bid= $_POST['bid'];

switch ($op) {
case 'book_edit':
    $cReservation['booking_id'] = $_POST['bid'];
    $cReservation['checkin_date'] = $_POST['checkin_date'];
    $cReservation['checkout_date']= $_POST['checkout_date'];
    $cReservation['room_id'] = $_POST['rid'];
    $cReservation['total_adult'] = $_POST['total_adult'];
    $cReservation['total_children'] = $_POST['total_children'];
    $cReservation['special_requirement'] = $_POST['special_requirement'];
    $cReservation['total_amount'] = $_POST['total_amount'];
    $cReservation['deposit'] = $_POST['deposit'];
    $cReservation['payment_status'] = $_POST['payment_status'];

    $Reservation = new RerservationModel();
    $query = $Reservation->set_customer($cReservation);

    header("Location:reservation.php?booking_id=".$bid);

break;

case 'cus_edit':
    $customer['cus_id'] = $_POST['cid'];
    $customer['first_name'] = $_POST['fname'];
    $customer['last_name'] = $_POST['lname'];
    $customer['email'] = $_POST['email'];
    $customer['telephone_no'] = $_POST['tel_no'];
    $customer['add_line1'] = $_POST['add_line1'];
    $customer['add_line2'] = $_POST['add_line2'];
    $customer['city']  = $_POST['city'];
    $customer['state'] = $_POST['state'];
    $customer['postcode'] = $_POST['pcode'];
    $customer['country'] = $_POST['country'];


    $cmodel = new CustomerModel();
    $cmodel->set_customer($customer);


    header("Location:reservation.php?booking_id=".$bid);
break;

default:
      header("Location:main.php");
break;
}
?>
