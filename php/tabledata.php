<?php

$busid = $_SESSION['busid'];
$sql2 = mysqli_query($conn,"SELECT name FROM buses WHERE bId ='$busid'");
$busname = mysqli_fetch_row($sql2)[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
​
<div class="container">
  <h2>A REPORT FOR BUS <?php echo $busname  ?></h2>
  <p></p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Email</th>
       <th>Seat Number</th>
        <th>Price</th>
        <th>Ticket</th>
      <th>Route</th>
      <th>DateBooked</th>
      </tr>
    </thead>
    <tbody>
<?php

foreach($results as $result) :?>
      <tr>
        <td><?php echo $result['email']  ?></td>
        <td><?php echo $result['seatno']  ?></td>
        <td><?php echo $result['price']  ?></td>
        <td><?php echo $result['uid']  ?></td>
        <td><?php echo $result['route']  ?></td>
         <td><?php echo $result['dateBooked']  ?></td>
      </tr>
<?php endforeach ?>        
    </tbody>
  </table>
</div>
​
</body>
</html>




