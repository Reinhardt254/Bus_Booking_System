<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');
$email = $_POST['email'];
$password = $_POST['password'];

$output = '';
$sql = mysqli_query($conn,"INSERT INTO admins (email,password)
                    VALUES('$email','$password')
");

if($sql){
 $output .='success'; 
 echo $output;  
}else{
    $output.='Something went wrong ';
   echo $output;
}
  

?>