<?php

class CustomerModel{

  function get_customer($lastname){
  }
	
  function get_customer($firstname,$lastname){	  
  }
	
  function get_customer($email)	
	  
 	  
  		
  function set_customer($customer){
	  $db = new Database;
      $query = "select * from users where uidUsers='$custID'";
      $result = $db->query($query);  
  }	
	
	
}

?>
