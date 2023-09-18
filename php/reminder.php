<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');

$today = date('Y-m-d');

$tommorow = date('Y-m-d',strtotime($today. ' +24 hours'));
$sql = mysqli_query($conn,"SELECT * FROM bookings WHERE dateBooked = '$tommorow'");
$users = mysqli_fetch_all($sql,MYSQLI_ASSOC);
foreach($users as $user){
$to = $user['email'];
$date = $user['dateBooked'];
$origin = $user['origin'];
$destination = $user['destination'];

$subject = 'Reminder';

$message = '
<h3>
Hello '.$to.' , <br><br>
 Tomorrow '.$date.', you have at trip from '.$origin.'  to '.$destination.'.Please be punctual.
</h3>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";

if(mail($to,$subject,$message,$headers)){
    echo 'success';
}else{
    echo 'error';
}
 

}



?>