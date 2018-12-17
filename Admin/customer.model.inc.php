<?php

require_once('database.class.php');

class CustomerModel{

/*
  function get_customerID_lastname($lastname){
    $query = "select * from customer where $lastname like '%last_name%';";

    $db = new Database;
    $result = $db->query($query);

    if(!$result){
      return null;
    }
    $i = 1;
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
      $customers[i]->cust_id = $row['cust_id'];
      $customers[i]->first_name = $row['first_name'];
      $customers[i]->last_name = $row['last_name'];
      $customers[i]->email = $row['email'];
      $customers[i]->telephone_no = $row['telephone_no'];
      $customers[i]->add_line1 = $row['add_line1'];
      $customers[i]->add_line2 = $row['add_line2'];
      $customers[i]->city = $row['city'];
      $customers[i]->state = $row['state'];
      $customers[i]->postcode = $row['postcode'];
      $customers[i]->country = $row['country'];
      $i++ ;
    }
    return $customers;
  }

  function get_customer_by_tel($telephone){

    $query = "select * from customer where telephone_no=$telephone;";

    $db = new Database;
    $result = $db->query($query);

    if(!$result){
      return null;
    }
    $i = 1;
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
      $customers[i]->cust_id = $row['cust_id'];
      $customers[i]->first_name = $row['first_name'];
      $customers[i]->last_name = $row['last_name'];
      $customers[i]->email = $row['email'];
      $customers[i]->telephone_no = $row['telephone_no'];
      $customers[i]->add_line1 = $row['add_line1'];
      $customers[i]->add_line2 = $row['add_line2'];
      $customers[i]->city = $row['city'];
      $customers[i]->state = $row['state'];
      $customers[i]->postcode = $row['postcode'];
      $customers[i]->country = $row['country'];
      $i++ ;
    }
    return $customers;
  }
*/

  function set_customer($customer){
    $query = "update customers set first_name ='".$customer['first_name']."', last_name ='".$customer['last_name']."',
    email ='".$customer['email']."',telephone_no ='".$customer['telephone_no']."', add_line1 ='".$customer['add_line1'].
    "',add_line2 ='".$customer['add_line2']."', city ='".$customer['city']."',state ='".$customer['state'].
   "',postcode ='".$customer['postcode']."',country ='".$customer['country']."' WHERE cus_id =".$customer['cus_id'].";";

    $db = new Database;
    $result = $db->query($query);
  }

  function get_customer_by_ID($custID){
    $query = "select * from customers where cus_id = $custID;";
    $db = new Database;
    $result = $db->query($query);

    if(!$result){
      return null;
    }

    $customer = mysqli_fetch_array($result,MYSQLI_BOTH);

    return $customer;
  }

}

?>
