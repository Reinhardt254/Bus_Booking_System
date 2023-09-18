<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');
$email = $_POST['email'];
$ticket = $_POST['ticket'];
$phone = $_POST['phone'];
$reason = $_POST['reason'];
$today  =  date('Y-m-d');


$output = '';
$sql = mysqli_query($conn,"SELECT * FROM bookings WHERE dateBooked > '$today' AND email = '$email' AND uid = '$ticket'");


if(mysqli_num_rows($sql)===1){
$tickets = mysqli_fetch_row($sql);
$price = $tickets[9];
$route = $tickets[10];
$date = $tickets[2];
$bus = $tickets[8];
$amount = $price*.70;
mysqli_query($conn,"INSERT INTO cancellations (price,route,date,ticket,email,busid,reason)
VALUES('$price','$route','$date','$ticket','$email','$bus','$reason')

");
// -- send email to admin//
$to = 'transafarissacco@gmail.com';  //admin email
$subject = 'TransafarisCancel['.$ticket.']';


$message = '
<h3>
Dear '.$to.' , <br><br>
 '.$email.' phone number '.$phone.' has cancelled ticket NO '.$ticket.',please make a refund of '.$amount.'
</h3>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";


 if(mail($to,$subject,$message,$headers)){
   //===================send email to user===============================
$to = $email;
$subject = 'Cancel['.$ticket.']';


$message = '
<h3>
Dear '.$email.' , <br><br>
 your ticket NO  '.$ticket.' has successifully been cancelled.You will recieve a refund of Ksh '.$amount.' within 2hrs.
</h3>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";


mail($to,$subject,$message,$headers);
$sql2 = mysqli_query($conn,"DELETE FROM bookings WHERE uid = '$ticket'");
 echo "success";
//  free seat
 }else{
     echo "something went wrong ";
 }

}else{

    $output.='Invalid ticket number';
    echo $output;
  
}
?>