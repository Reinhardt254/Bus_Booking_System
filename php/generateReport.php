<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');

$bus =$_POST['busid'];
$month = $_POST['month'];
$_SESSION['month']= $month;
$_SESSION['busid']= $bus;
$sql = mysqli_query($conn,"SELECT * FROM bookings WHERE dateBooked LIKE '_____$month%' AND bId = '$bus'");

if(mysqli_num_rows($sql)>0){
     $results = mysqli_fetch_all($sql,MYSQLI_ASSOC);
  echo include('tabledata.php');

}else{

echo "No data";
}

?>