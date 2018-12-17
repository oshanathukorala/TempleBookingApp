<?php

require_once('database.class.php');

class RoomModel{

/*  function get_room($roomID){
  }

  function set_room($room){

  }

  function edit_room($roomID){
	  $db = new Database;
      $query = "select * from users where uidUsers='$custID'";
      $result = $db->query($query);
  }
*/
/*
  function get_room_by_ID($RoomID){
    $query = "select * from room where room_id = $RoomID;";
    $db = new Database;
    $result = $db->query($query);

    if(!$result){
      return null;
    }

    $room = mysqli_fetch_array($result,MYSQLI_BOTH);

    return $room;
  }

*/

function set_room($Room){
  $query = "update room set total_room ='".$Room['total_room']."', occupancy ='".$Room['occupancy']."',size ='".$Room['size']."', view ='".$Room['view'].
  "',room_name ='".$Room['room_name']."', descriptions ='".$Room['descriptions']."',rate ='".$Room['rate'].
 "',imgpath ='".$Room['imgpath']."'WHERE room_id =".$Room['room_id'].";";

  $db = new Database;
  $result = $db->query($query);
}

function add_room($Room){
  $query = "insert into `room` ( `total_room`, `occupancy`, `size`, `view`, `room_name`, `descriptions`, `rate`, `imgpath`) VALUES ('".$Room['total_room']."','".$Room['occupancy']."','".$Room['size']."','".$Room['view'].
  "','".$Room['room_name']."','".$Room['descriptions']."','".$Room['rate']."','".$Room['imgpath']."');";

  $db = new Database;
  $result = $db->query($query);
}

/*
function set_room($Room){
  $query = "update room set total_room ='".$Room['total_room']."', occupancy ='".$Room['occupancy']."',size ='".$Room['size']."', view ='".$Room['view'].
  "',room_name ='".$Room['room_name']."', descriptions ='".$Room['descriptions']."',rate ='".$Room['rate'].
 "',imgpath ='".$Room['imgpath']."'WHERE room_id =".$Room['room_id'].";";

  $db = new Database;
  $result = $db->query($query);
}
*/



function get_room_by_ID($RoomID){
  $query = "select * from `room` WHERE room_id='$RoomID';";
  $db = new Database;
  $result = $db->query($query);

  if(!$result){
    return null;
  }

  $room = mysqli_fetch_array($result,MYSQLI_BOTH);

  return $room;
 }


  function delete_room_by_ID($RoomID){
    $query = "delete FROM room WHERE room_id=".$RoomID.";";
    $db = new Database;
    $result = $db->query($query);
  }

  function get_room_by_condition($condition){
    $query = "select * from room where ".$condition.";";
    $db = new Database;
    $result = $db->query($query);

    if(!$result){
      return null;
    }


    $i = 1;
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
      $rooms[$i]->room_id = $row['room_id'];
      $rooms[$i]->total_room = $row['total_room'];
      $rooms[$i]->occupancy = $row['occupancy'];
      $rooms[$i]->size = $row['size'];
      $rooms[$i]->view = $row['view'];
      $rooms[$i]->room_name = $row['room_name'];
      $rooms[$i]->descriptions = $row['descriptions'];
      $rooms[$i]->rate = $row['rate'];
      $rooms[$i]->imgpath = $row['imgpath'];
      $i++ ;
    }

    return $rooms;

    return $query;
  }


}

?>
