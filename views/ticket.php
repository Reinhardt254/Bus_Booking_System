<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');

$username=$_SESSION['username'];
$origin=$_SESSION['origin'];
$destination=$_SESSION['destination'];
$route = $origin."_".$destination;
$date = $_SESSION['date'];
$busname = $_SESSION['busname'];



$sql = mysqli_query($conn,"SELECT * FROM bookings WHERE uid ='$username'");
$results = mysqli_fetch_all($sql,MYSQLI_ASSOC);

foreach($results as $user ){
    $email = $user['email'];
    $seatno = $user['seatno'];
    $price = $user['price'];
    $userid = $user['uid'];
}


?>




<html >
<head>
   
    <script src="https://kit.fontawesome.com/29344b4c51.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="ticket-container">
        <div class="ticket">
            <div class="ticket-header">
                <h4>Transafaris</h4>
                <p class="ticket-no">Serial : <?php echo $userid ?></p>
                <button><i class="fa fa-download" aria-hidden="true"></i></button>
            </div>
            <div class="ticket-main">
                <h3><?php echo $email ?></h3>
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
                        <div class="row-title">time</div>
                        <div class="row-down">23.49pm</div>
                    </div>
                    <div class="row">
                        <div class="row-title">Seat</div>
                        <div class="row-down"><?php echo $seatno ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>