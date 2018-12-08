var callbacks = {};
var revcallbacks = {};
//$(document).ready(function(){
if ($("#fpopup").length) { // if we have a popup to show
    i = 0;
    $("div[id='fpopup']").each(function() {
        var currentHTML = $(this).html();
        $(this).attr('did', i);
        $(this).html('<div id="hover'+i+'"></div><div id="popup'+i+'"><div id="close'+i+'">X</div>\<div class="animated bounce">'+currentHTML+'</div></div>');
        callbacks[String(i)] = $(this).attr("callback");
        revcallbacks[$(this).attr("callback")] = String(i);
        i++;
    });
    //alert(revcallbacks.toSource())
    for (var key in callbacks) {
        var sector = callbacks[key];
        (function(sec){
          $(sec).on("click", function(e){
            var index = revcallbacks[sec];
            $("#hover"+index).fadeIn();
            $("#popup"+index).fadeIn();
          });
        }(sector))
    }
    $("[id^='hover']").click(function(){
        var didid = $(this).parent().attr('did');
        $(this).fadeOut();
        $("#popup"+didid).fadeOut();
    });
    $("[id^='close']").click(function(){
        var didid = $(this).parents().eq(1).attr('did');
        $("#hover"+didid).fadeOut();
        $("#popup"+didid).fadeOut();
    });
    //});
}
function genKey() {
    var key = ""
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    for (var i=0; i < 16; i++) {
        key += possible.charAt(Math.floor(Math.random() * possible.length));
        if (i % 4 === 0 && !(i in [0])) {
            key += '-';
        }
    }

    // move last char to first, a little hacky
    key = key.substr(1) + key.substr(0, 1);

    return key;
}
var ids = [];
var currentActive2 = '';
var children = document.getElementById('objects').children;
var childrenLength = children.length;
for(var i = 0; i < childrenLength; i++){
    if(children[i].nodeName.toLowerCase() === 'div'){
        ids.push(children[i].getAttribute('repr'));
    }
}
$("#cright").on('click', function() {
    var l = ids.length;
    var i = ids.indexOf(document.getElementById('currentActive').value);
    var nextid = ids[(i+1)%l];
    for(var i = 0; i < childrenLength; i++){
        if(children[i].getAttribute('repr') == document.getElementById('currentActive').value){
            children[i].style.display = "none";
        }
        if(children[i].getAttribute('repr') == nextid){
            children[i].style.display = "block";
            currentActive2 = children[i].getAttribute('repr');
        }
    }
    document.getElementById('currentActive').value = currentActive2;
    currentActive2 = '';
});
$("#cleft").on('click', function() {
    var l = ids.length;
    var i = ids.indexOf(document.getElementById('currentActive').value);
    var previd = ids[(i+l-1)%l];
    for(var i = 0; i < childrenLength; i++){
        if(children[i].getAttribute('repr') == document.getElementById('currentActive').value){
            children[i].style.display = "none";
        }
        if(children[i].getAttribute('repr') == previd){
            children[i].style.display = "block";
            currentActive2 = children[i].getAttribute('repr');
        }
    }
    document.getElementById('currentActive').value = currentActive2;
    currentActive2 = '';
});
$('.autocomplete-suggestion').css('width','300px');


//main.php js files

function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;

        $('.view_data').click(function () {
          var id = $(this).attr("value");
          showDialog({
            title: 'DELETE booking with ID: '+id,
            text: 'Are you sure you want to Delete this Booking?',
            negative: {
              title: 'Cancel'
            },
            positive: {
              title: 'Yes',
              onClick: function (e) {
                xmlhttp.open("POST","delete.reservation.php?bookingID="+id,true);
                xmlhttp.send();
              }
            }
          });
        });

      }
    };
    xmlhttp.open("GET","getReservation.php?q="+str,true);
    xmlhttp.send();
  }
}



$('.button-collapse').sideNav({
  menuWidth: 300, // Default is 300
  edge: 'left', // Choose the horizontal origin
  closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
  draggable: true // Choose whether you can drag to open on touch screens
});
$(document).ready(function(){
  $('.tooltipped').tooltip({delay: 50});
});
$('select').material_select();
$('.collapsible').collapsible();
