<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');

$city =ucfirst($_POST['city']);
$cityCode = strtoupper($_POST['cityCode']);

$sql = mysqli_query($conn,"SELECT * FROM cities WHERE name = '$city' or value = '$cityCode'");
if(mysqli_num_rows($sql)>0){
    echo  $city." "."Already exists";

}else{
    $sql2 = mysqli_query($conn,"INSERT INTO cities (name,value)
    VALUES('$city','$cityCode')
");
echo 'success';

}

?>