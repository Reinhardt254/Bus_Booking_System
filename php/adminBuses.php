<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');

$output = '';
$sql = mysqli_query($conn,"SELECT * FROM buses");
$buses = mysqli_fetch_all($sql,MYSQLI_ASSOC);
if(mysqli_num_rows($sql) > 0){

 $output .= include('adminBusData.php');   
}else{
    $output.='No buses available for this date';
    echo $output;
}
?>






