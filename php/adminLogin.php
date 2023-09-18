<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');
$email = $_POST['email'];
$password = $_POST['password'];

$output = '';
$sql = mysqli_query($conn,"SELECT * FROM admins WHERE email = '$email' AND password = '$password'");

if(mysqli_num_rows($sql)===1){
 $output .='success'; 
 echo $output; 

}else{

    $output.='Incorrect credentials';
    echo $output;
  
}

?>