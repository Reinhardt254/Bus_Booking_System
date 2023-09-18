<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');

$bus = $_GET['bus'];
$today = date('Y-m-d');







$sql = mysqli_query($conn,"SELECT * FROM bookings WHERE bId ='$bus' AND dateBooked	 >= '$today' order by seatno desc");
$users = mysqli_fetch_all($sql,MYSQLI_ASSOC);

$sql2 = mysqli_query($conn,"SELECT name FROM buses WHERE bId ='$bus'");
$busname = mysqli_fetch_row($sql2)[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/29344b4c51.js"></script>
   <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="admin-seats">
      <div class="seats-header">
          <div class="logo">
            <a href="adminBuses.html"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a>
          </div>
          <ul class="menus">
              <li><a href="adminLogin.html">Logout</a></li>
         <li><a href="report.php?busid=<?php echo $bus  ?>">Report</a></li>
              <li><div class="profile"><img src="/images/bus2.jpg" alt="" srcset=""></div></li>
          </ul>
      </div>
      <div class="seats-subheader">
          <div class="bus-title"><h2><?php echo  $busname ?></h2></div>
         
      </div>
    </div>
    <div class="seats-table">
        <?php if(mysqli_num_rows($sql)> 0)  :?>
        <table> 
            <tr ><th>Email</th><th>Route</th><th>Travel Date</th><th>Seat</th><th>Action</td></tr><br><br>
             
           
             <?php foreach($users as $user) :?>
          

    <tr><td><?php echo  $user['email'] ?></td><td><?php echo $user['route'] ?></td><td><?php echo $user['dateBooked'] ?></td><td><?php echo $user['seatno'] ?></td><td><button><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button></td></tr>
              
         <?php endforeach ?>

        </table> 
         <?php else : ?>
            
           <tr>No bookings yet</tr>

             <?php endif ?>
    </div>
    
</body>
</html>