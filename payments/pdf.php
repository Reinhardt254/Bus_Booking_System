
<?php 
session_start();
$conn = mysqli_connect('localhost','root','','transafarisdb');

$username=$_SESSION['username'];
$origin=$_SESSION['origin'];
$destination=$_SESSION['destination'];
$route = $origin."_".$destination;
$date = $_SESSION['date'];
$busname = $_SESSION['busname'];
$time = $_SESSION['time'];


$sql = mysqli_query($conn,"SELECT * FROM bookings WHERE uid ='$username'");
$results = mysqli_fetch_all($sql,MYSQLI_ASSOC);

foreach($results as $user ){
    $email = $user['email'];
    $seatno = $user['seatno'];
    $price = $user['price'];
    $userid = $user['uid'];
}


 require_once '../vendor/autoload.php'; 

// reference the Dompdf namespace

use Dompdf\Dompdf;
// instantiate and use the dompdf class
use Dompdf\Options;
$options = new Options();
$options->setIsHtml5ParserEnabled(true);
$dompdf = new Dompdf($options);
$page = '<html>
<head>
   
    <script src="https://kit.fontawesome.com/29344b4c51.js"></script>
  
    <style>
    body{
        background:white;
    }
    .ticket-container{
        border:1px solid #7e5ad4;
        width: 100%;
        max-height: 100vh;
        background:white;
        display: flex;
        flex-direction: column;
        align-items:center;
        justify-content: center;
    }
    .ticket{
        width: 45vh;
        border:none;
        box-shadow:0 5px 10px rgba(0, 0, 0, 0.192);
        background:white;
    }
    .ticket-header{
        color: whitesmoke;
        padding: 1rem;
        background-color:#7e5ad4;
        display: flex;
        font-size:1.5rem;
        align-items:flex-end;
        justify-content: space-between;
    
    }
   
    .ticket-header .ticket-no{
     font-size: 1rem;
     color: white;
     font-weight:700;
    
    }
    .ticket-main{
        background: white;
        padding: 1rem;
        
    }
   
    </style>
</head>
<body>
<div class="ticket-container">
        <div class="ticket">
            <div class="ticket-header">
                
                <pre><h4>Transafaris             <span class="ticket-no">Ticket number:'.$userid. '</span></h4></pre>
            </div>
             <div class="ticket-main">
             <pre><h3>'.$email.'</h3>
                <p><span class="title">Date           </span><span class="sub">'.$date.'</span></p>
                <p><span class="title">Route          </span><span class="sub">'.$route.'</span></p>
                <p><span class="title">Seat           </span><span class="sub">'.$seatno.' </span></p>
                <p><span class="title">Bus            </span><span class="sub"> '.$busname.' </span></p>
                <p><span class="title">Time           </span><span class="sub"> '.$time.'AM </span></p>
                <p><span class="title">Total Price    </span><span class="sub">'. $price .'</span></p>
            </pre></div>
           
    </div>
</body>
</html>'
;



$dompdf->loadHtml($page);



// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');


// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('ticket',array('Attachment'=>0));

//===========================================================send email===============================



?>
