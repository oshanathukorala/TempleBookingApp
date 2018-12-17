<?php include 'Header.php'; ?>
<?php

require_once('Room.model.inc.php');
$Room= new RoomModel();

$Rooms = $Room->get_room_by_condition('1=1');

?>

<main>
  <section class="content">
    <div class="page-announce valign-wrapper"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Room Details</h1></div>

    <table class="striped hover centered">
      <thead><tr>
        <th>Room Name</th>
        <th>Thunmbnail</th>
        <th>Total Rooms</th>
        <th>Size</th>
        <th>View</th>
        <th>Occupancy</th>
        <th>Rate</th>
        <th>Desciption</th>
        <th>Manage Room</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $arrayLength = count($Rooms);
      for ($i = 1; $i <=$arrayLength; $i++) {
        ?><tr>
          <th><?php echo $Rooms[$i]->room_name ?></th>
          <th><img src="<?php echo $Rooms[$i]->imgpath ?>" style="height:50px;width:50px;"></th>
          <th><?php echo $Rooms[$i]->total_room ?></th>
          <th><?php echo $Rooms[$i]->size ?></th>
          <th><?php echo $Rooms[$i]->view ?></th>
          <th><?php echo $Rooms[$i]->occupancy ?></th>
          <th><?php echo $Rooms[$i]->rate ?></th>
          <th><?php echo $Rooms[$i]->descriptions ?></th>
          <th>
          <div class="row" id="room">
            <div class="btn-toolbar">
                <button class="btn waves-effect waves-light btn_ab2" type="button" onClick="showRoom(<?php echo $Rooms[$i]->room_id ?>)">
                  <i class="material-icons">edit</i>
                </button>

                <!--<a href="#" class="small-box-footer btn3" class="animsition-link" type=button onClick="showRoom(<?php// echo $Rooms[$i]->room_id ?>)">More info <i class="fa fa-arrow-circle-right"></i></a>-->
              </div>
              <div class="btn-toolbar">
                <button class="view_data btn red" type="submit" value="<?php echo $Rooms[$i]->room_id ?>" id="show-action">
                <i class="material-icons">remove</i>
                </button>
              </div>
            </div>
          </th>
        </tr>

      <?php } ?>
    </tbody>
    </table>

<button class="add_data btn waves-effect waves-light modal-trigger" type="submit" id="addroom_btn">Add Room<i class="material-icons left">library_add</i></button>

  </div>
</section>


</main>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="//storage.googleapis.com/code.getmdl.io/1.2.1/material.min.js"></script>
<script src="js\mdl-jquery-modal-dialog.js"></script>

<script>

$('.view_data').click(function () {
  var id = $(this).attr("value");
  showDialog({
    title: 'DELETE room with ID: '+id,
    text: 'Are you sure you want to delete this room?',
    negative: {
      title: 'Cancel'
    },
    positive: {
      title: 'Yes',
      onClick: function (e) {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();

        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.open("POST","delete.room.php?RoomID="+id,true);
        xmlhttp.send();
        location.reload();
      }
    }
  });
});
</script>


<script>
//$('.btn_ab2').click(function () {
function showRoom(str) {
 if (str == "") {
   return;
 } else {

  //var x = document.getElementById('btn_ab2').value;
  //alert(x);

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      showDialog({
        text:this.responseText
    });
    }
  };
  xmlhttp.open("GET","update.room.php?id="+str,true);
  xmlhttp.send();
 }
}
//});
</script>

<script>
//$('.btn_ab2').click(function () {

$('.add_data').click(function () {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      showDialog({
        text:this.responseText
    });
    }
  };
  xmlhttp.open("GET","add.room.php",true);
  xmlhttp.send();

});
//});
</script>
<!-- Footer starts here-->

<?php include 'Footer.php'?>
