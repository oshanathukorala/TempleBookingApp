<?php

require_once('Room.model.inc.php');

$Room = new RoomModel();

$RoomID = intval($_GET['RoomID']);

$Room->delete_room_by_ID($RoomID);

 ?>
