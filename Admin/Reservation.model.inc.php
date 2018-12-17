<?php

require_once('database.class.php');

class RerservationModel{

  function set_customer($Reservation){
    $query = "update reservation set checkin_date ='".$Reservation['checkin_date']."', checkout_date ='".$Reservation['checkout_date']."',
    room_id ='".$Reservation['room_id']."',total_adult ='".$Reservation['total_adult']."', total_children ='".$Reservation['total_children'].
    "',special_requirement ='".$Reservation['special_requirement']."', total_amount ='".$Reservation['total_amount']."',deposit ='".$Reservation['deposit'].
   "',payment_status ='".$Reservation['payment_status']."'WHERE booking_id =".$Reservation['booking_id'].";";

    $db = new Database;
    $result = $db->query($query);
  }

  function get_reservation_by_ID($bookingID){
    $query = "select * from `reservation` WHERE booking_id='$bookingID';";
    $db = new Database;
    $result = $db->query($query);

    if(!$result){
      return null;
    }

    $booking = mysqli_fetch_array($result,MYSQLI_BOTH);

    return $booking;
  }

  function delete_reservation_by_ID($bookingID){
    $query = "DELETE FROM `reservation` WHERE booking_id='$bookingID';";
    $db = new Database;
    $result = $db->query($query);
  }

  function get_reservation_count_by_condition($condition){
    $db = new Database;
    $result = $db->query($query);

    if(!$result){
      return 0;
    }

    $i = 1;
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
      $i++;
    }
    return $i;
  }


  function get_reservationby_condition($condition){
    $query = "select * from reservation where $condition ;";
    $db = new Database;
    $result = $db->query($query);

    if(!$result){
      return null;
    }

    $i = 1;
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
      $reservations[$i]->booking_id = $row['booking_id'];
      $reservations[$i]->total_adult = $row['total_adult'];
      $reservations[$i]->total_children = $row['total_children'];
      $reservations[$i]->checkin_date = $row['checkin_date'];
      $reservations[$i]->checkout_date = $row['checkout_date'];
      $reservations[$i]->special_requirement = $row['special_requirement'];
      $reservations[$i]->payment_status = $row['payment_status'];
      $reservations[$i]->total_amount = $row['total_amount'];
      $reservations[$i]->balance= $row['total_amount']-$row['deposit'];
      $reservations[$i]->deposit = $row['deposit'];
      $reservations[$i]->booking_date = $row['booking_date'];
      $reservations[$i]->cust_id = $row['cust_id'];
      $reservations[$i]->room_id = $row['room_id'];
      $i++ ;
    }

    return $reservations;
  }
}

?>
