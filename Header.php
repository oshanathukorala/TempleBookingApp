<?php

require_once('user.model.inc.php');
session_start();

if(!isset($_SESSION['user'])){
  header("Location: login.php");
}else{
  $user = $_SESSION['user'];
}

?>

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

<body>

  <a class="btn-flat" style="position: absolute; top: 5vw; right: 3vw; border: 0; color:white; font-size: 20px;"  href="index.php?op=logout">Sign-off</a>

  <!-- Side navigation-->
  <ul id="slide-out" class="side-nav fixed z-depth-4">
    <li>
      <div class="userView">
        <div class="background">
          <img src="img/photo1.png">
        </div>
        <a href="#!user"><img class="circle" src="img/avatar04.png"></a>
        <a href="#!name"><span class="white-text name">Welcome back,</span></a>
        <a href="#!email"><span class="white-text email"><?php echo $user; ?></span></a>
      </div>
    </li>

    <li><a class="active" href="main.php"><i class="material-icons pink-item">dashboard</i>Admin Panel</a></li>
    <li><div class="divider"></div></li>

    <li><a class="subheader">Management</a></li>
    <li><a href="room.php"><i class="material-icons pink-item">room</i>Room management</a></li>
    <li><a href="names.html"><i class="material-icons pink-item">hotel</i>Make a Booking</a></li>
    <li><a href="signup.php"><i class="material-icons pink-item">person_add</i>Add User</a></li>
  </ul>
