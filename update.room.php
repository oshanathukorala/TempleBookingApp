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

require_once('Room.model.inc.php');

$Room_id = intval($_GET['id']);

$Room= new RoomModel();

$Rooms = $Room->get_room_by_ID($Room_id);

?>

<form class="col s12" action="update.php" method="post" enctype="multipart/form-data">
  <div class="input-field col s6" style="display:none">
    <input name="rid" value="<?php echo $Rooms['room_id']; ?>" id="disabled" type="text"  class="validate">
    <label class="active" for="disabled">Room ID</label>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input name="room_name" value="<?php echo $Rooms['room_name']; ?>" id="room_name" type="text" class="validate">
      <label class="active" for="room_name">Room Name</label>
    </div>
    <div class="input-field col s6">
      <input name="total_room" value="<?php echo $Rooms['total_room']; ?>" id="total_room" type="number" class="validate">
      <label class="active" for="total_room">Total Rooms</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input name="size" value="<?php echo $Rooms['size']; ?>" id="Size" type="text" class="validate">
      <label class="active" for="Size">Size</label>
    </div>
    <div class="input-field col s6">
      <input name="view" value="<?php echo $Rooms['view']; ?>" id="View" type="text" class="validate">
      <label class="active" for="view">View</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input name="Occupancy" value="<?php echo $Rooms['occupancy']; ?>" id="Occupancy" type="text" class="validate">
      <label class="active" for="Occupancy">Occupancy</label>
    </div>
    <div class="input-field col s6">
      <input name="rate" value="<?php echo $Rooms['rate']; ?>" id="rate" type="text" class="validate">
      <label class="active" for="rate">Rate</label>
    </div>
  </div>
  <div class="input-field col s6">
      <input name="descriptions" value="<?php echo $Rooms['descriptions']; ?>" id="descriptions" type="text" class="validate">
      <label class="active" for="descriptions">Descriptions</label>
  </div>
  <div class="file-field input-field">
      <div class="btn">
        <span><i class="material-icons left">file_upload</i></span>
        <input type="file" type="file" id="img" name="img" required>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload Room Image [recommended size is 400 X 400]">
      </div>
  </div>

  <button class="btn darken-4 waves-effect waves-light" type="submit" name="op" value="room_edit">Edit Room
    <i class="material-icons left">person_add</i>
  </button>
</form>

</html>
