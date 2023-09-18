<?php
   session_start();
   $conn = mysqli_connect('localhost','root','','transafarisdb');
  //success
  $amount = $_SESSION['price'];
  $email = $_SESSION['email'];
  $bus = $_SESSION['bus'];
  $uid = $_SESSION['uid'];
  $seatno = $_SESSION['seatno'];
  $date = $_SESSION['date'];
  $origin= $_SESSION['origin'];
  $destination= $_SESSION['destination'];
  $route= $_SESSION['route'];

  $sql = mysqli_query($conn,"INSERT INTO bookings (email,bId,uid,seatno,dateBooked,price,origin,destination,route)
                       VALUES('$email','$bus','$uid','$seatno','$date','$amount','$origin','$destination','$route')
              ");
              if($sql){
                 // success
               header('location:./ticket.php');
              }else{
                  echo 'not inserted';
              }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Document</title>

</head>
<body>
    <script>
     Swal.fire({
                title: 'Payments successiful',
                text: 'We are processing your ticket',
                icon: 'success',
                confirmButtonText: 'OK'
              })
    </script>
</body>
</html>