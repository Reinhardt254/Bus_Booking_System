<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');
$date = $_SESSION['date'];
$username=$_SESSION['username'];
$origin=$_SESSION['origin'];
$destination=$_SESSION['destination'];
$route = $origin."_".$destination;

$output = '';
$sql = mysqli_query($conn,"SELECT * FROM buses WHERE route1 = '$route' OR route2 = '$route'");
$buses = mysqli_fetch_all($sql,MYSQLI_ASSOC);
if(mysqli_num_rows($sql) > 0){

 $output .= include('busData.php');  

}else{
    $output.='';
    echo $output;
}


?>