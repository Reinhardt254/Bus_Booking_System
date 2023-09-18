<?php
session_start();
$conn = mysqli_connect('localhost','root','','transafarisdb');

$username=$_SESSION['username'];
$origin=$_SESSION['origin'];
$destination=$_SESSION['destination'];
$route = $origin."_".$destination;
$date = $_SESSION['date'];
$busname = $_SESSION['busname'];
$time = $_SESSION['time'];



$sql = mysqli_query($conn,"SELECT * FROM bookings WHERE uid ='$username'");
$results = mysqli_fetch_all($sql,MYSQLI_ASSOC);

foreach($results as $user ){
    $email = $user['email'];
    $seatno = $user['seatno'];
    $price = $user['price'];
    $userid = $user['uid'];
}


//===========================================================send email===============================
$to = $email;
$subject = 'TransafarisTicket['.$userid.']';


$message = '
<h3>
Dear '.$email.' , <br><br>
 your ticket NO  '.$userid.'  from '.$origin.' to '.$destination.' seat
'.$seatno.' for '.$date.' at '.$time.'AM, '.$busname.' has been booked ,paid KES'.$price.' .Report before '.$time.'AM
</h3>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";


mail($to,$subject,$message,$headers);
 

?>

<html >
<head>
   
    <script src="https://kit.fontawesome.com/29344b4c51.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
   <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <div class="ticket-container">
        <div class="ticket">
            <div class="ticket-header">
                <h4>Transafaris</h4>
                <p class="ticket-no">Ticket : <?php echo $userid   ?></p>
               <a href="pdf.php"><button ><i class="fa fa-download" aria-hidden="true"></i></button></a>
            </div>
            <div class="ticket-main">
                <h5><?php echo $email ?></h5>
                <p><span class="title">Date</span><span class="sub"><?php echo $date ?></span></p>
                <p><span class="title">Route</span><span class="sub"><?php echo $route?></span></p>
                <p><span class="title">Seat</span><span class="sub"><?php echo $seatno ?></span></p>
                <p><span class="title">Bus</span><span class="sub"><?php echo $busname ?></span></p>
                
                <p><span class="title">Total Price</span><span class="sub"><?php echo $price ?></span></p>
            </div>
            <div class="ticket-footer">
                <div class="qr-code">
                    <i class="fa fa-qrcode" aria-hidden="true"></i>
                </div>
                <div class="footer-left">
                    <div class="row">
                        <div class="row-title">Time</div>
                        <div class="row-down"><small><?php echo $time ?>AM</small></div>
                    </div>
                    <div class="row">
                        <div class="row-title">Seat</div>
                        <div class="row-down"><?php echo $seatno ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
          Swal.fire({
                icon: 'success',
                title: 'Done',
                text: ' Check your email for more information',
                confirmButtonText: 'OK'
           
              })
    </script>
    
</body>
</html>
