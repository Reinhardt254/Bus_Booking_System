<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');
$email = $_POST['email'];
$uid = $_POST['username'];
$bus = $_POST['busId'];
$seatno = $_POST['seatnumber'];
$date = $_POST['date'];
$price = $_POST['price'];
$origin = $_POST['origin'];
$destination = $_POST['destination'];
$route = $origin."_".$destination;
// session variables
$_SESSION['email']=$email;
$_SESSION['uid']=$uid;
$_SESSION['bus']=$bus;
$_SESSION['seatno']=$seatno;
$_SESSION['date']=$date;
$_SESSION['price']=$price;
$_SESSION['origin']=$origin;
$_SESSION['destination']=$destination;
$_SESSION['route']=$route;



$output = '';
if($seatno === ''){

   echo 'No seat selected';
}else{
//   $sql = mysqli_query($conn,"INSERT INTO bookings (email,bId,uid,seatno,dateBooked,price,origin,destination,route)
//                                           VALUES('$email','$bus','$uid','$seatno','$date','$price','$origin','$destination','$route')
// ");
echo 'success';

}



  

?>