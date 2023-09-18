<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');
if(isset($_GET['bus'])){
    $bId = $_GET['bus'];
}else{
    $bId = $_SESSION['bus'];
}
$username=$_SESSION['username'];
$origin=$_SESSION['origin'];
$destination=$_SESSION['destination'];
$route = $origin."_".$destination;
$_SESSION['bus'] = $bId;
$date = $_SESSION['date'];


$output = '';

$sql = mysqli_query($conn,"SELECT capacity , price FROM buses WHERE bId = '$bId'");
$seats = mysqli_fetch_row($sql)[0]+1;

$sql2 = mysqli_query($conn,"SELECT  price FROM buses WHERE bId = '$bId'");
$price = mysqli_fetch_row($sql2)[0];

$sql3 = mysqli_query($conn,"SELECT seatno from bookings where bId = '$bId' AND dateBooked = '$date'");
$seatnums = mysqli_fetch_all($sql3,MYSQLI_ASSOC);


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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="seats-header">
        <div class="logo">
         <a href="buses.html"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> 
        </div>
        <ul class="menus">
            <li><a href="./">Booking</a></li>
            <li><a href="./support.php">support</a></li>
      
        </ul>
        <p class="errorSeats">some error</p>
    </div>
    <div class="main-seats">
        <div class="seats">
            
        
        <?php for ($x = 1; $x < $seats; $x++) :?>
          
        <button class="seat" value = <?php echo $x ?> ondblclick = "diselect(this)" onclick="ClickedBtn(this)" id =<?php echo $x ?><?php foreach($seatnums as $seatnum):?>  <?php if(in_array($x,$seatnum)){
     echo 'disabled';
    }else{
       echo '';
    } ?><?php endforeach ?> >
        <i style="font-size:2rem; color: rgba(0, 0, 0, 0.909)" class='bx bx-chair'></i>
       <span class="seat-num"><?php echo $x ?>
       </span>
      </button>
       
         <?php endfor ?>       
        
       

        </div>
        <div class="checkout">
            <form  class="boardin-point checkout_form" action="">
                   <input type="text" class="busId"value= <?php echo $bId ?> name='busId'hidden>
                    <input type="text" class='sno'  value='' name='seatnumber'hidden>
                    <input type="text"class="date" value = <?php echo $date ?> name='date'hidden>
                    <input type="text" class ='priceInp' name='price' value = '<?php echo $price ?>' hidden>
                    <input type="text"class="username" value = '<?php echo $username ?>' name='username'hidden>
                    
                <div class="form-group">
                    <label for="">Email</label>
                   <input type="email" value='' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name = 'email' required>
                </div>
                <div class="form-group">
                    <label for="">Boarding point</label>
                    <select name="origin" id="">
                        <option value="<?php echo $origin ?>"><?php echo $origin ?> Office</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Dropping Point</label>
                    <select name="destination" id="">
                        <option value="<?php echo $destination ?>"><?php echo $destination ?> Office</option>
                    </select>
                </div><br>

                 <p><span class="title">selected Seat</span><span class="sub selectedPara">0</span></p>
            <p><span>Price</span><span class ='priceSpan'>0</span></p>
            
            <button type="submit" class='flutterwave-btn' name='flutterwave'>Pay with Mobile Money</button>

            <button id=""  class='stripe-btn'>Pay with card</button>
   
            </form>

           

        </div>

       
    </div>

    
    
   <script src="js/seats.js"></script>
  
</body>
</html>