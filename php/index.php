<?php

session_start();
$conn = mysqli_connect('localhost','root','','transafarisdb');
$username = time();
$origin = $_POST['origin'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$route = $origin."_".$destination;
$_SESSION['username'] = $username;
$_SESSION['origin'] = $origin;
$_SESSION['date'] = $date;
$_SESSION['destination'] = $destination;


?>