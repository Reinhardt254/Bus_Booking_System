<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');

$origin = $_POST['origin'];
$destination = $_POST['destination'];
$route1 = $origin."_".$destination;
$route2 =$destination."_".$origin;
$capacity = $_POST['capacity'];
$time = $_POST['time'];
$price = $_POST['price'];
$bus_name= $_POST['name'];

$output = '';
$sql = mysqli_query($conn,"INSERT INTO buses (route1,route2,time,name,capacity,des1,des2,origin1,origin2,price)
                    VALUES('$route1','$route2','$time','$bus_name','$capacity','$destination','$origin','$origin','$destination','$price')
");

if($sql){
 $output .='success'; 
 echo $output;  
}else{
    $output.='Something went wrong';
   echo $output;
}
  

?>