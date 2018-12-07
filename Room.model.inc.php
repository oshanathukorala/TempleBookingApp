<?php

class RoomModel{

  function get_room($roomID){
  }
	
  function set_room($room){
	  
  }
		
  function edit_room($roomID){
	  $db = new Database;
      $query = "select * from users where uidUsers='$custID'";
      $result = $db->query($query);  
  }	
		
}

?>