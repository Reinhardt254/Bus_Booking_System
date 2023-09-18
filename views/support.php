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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php
$conn = mysqli_connect('localhost','root','','transafarisdb');
// querying support team =======================================
if(isset($_POST['query'])){
    $email = $_POST['email'];
    $subject2 = $_POST['subject'];
    $message1 = $_POST['message'];
   
   $query=  mysqli_query($conn,"INSERT INTO queries (email,subject,message)
                      VALUES('$email','$subject2','$message1')
   ");
   if($query){
    //    send email to user===============================
    $to = $email;
    $subject = "Re: $subject2";       
    $message = "Hello $email , thank you for contacting Transafaris .
    Your query has been recieved and is being worked on.
    ";
                        
   
   // Always set content-type when sending HTML email
   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   
   // More headers
   $headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";
   
   
   if(mail($to,$subject,$message,$headers)){
// send email to admin
$to = 'transafarissacco@gmail.com' ;
$subject = "RE : $subject2";       
$message = "Hello Transafaris , $email is seeking attention:
QUERY:
$message1
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";


if(mail($to,$subject,$message,$headers)){
    echo "  <script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'Message sent',
        confirmButtonText: 'OK'
      })
        </script>";
}else{

    echo "  <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'something went wrong',
        confirmButtonText: 'OK'
      })
        </script>";
}


   }
   echo "  <script>
   Swal.fire({
       icon: 'success',
       title: 'success',
       text: 'Message sent',
       confirmButtonText: 'OK'
     })
       </script>";
   }else{
    echo "  <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'something went wrong',
        confirmButtonText: 'OK'
      })
        </script>";
   }
}


// subscribing==============================================

if(isset($_POST['subscribe'])){
    $email = $_POST['email'];
    $find = mysqli_query($conn,"SELECT * FROM  subscriptions WHERE email = '$email'");

    if(mysqli_num_rows($find)>0){
        echo "  <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You already subscribed!',
            confirmButtonText: 'OK'
          })
            </script>";
    }else{ 
        $subscribe = mysqli_query($conn,"INSERT INTO  subscriptions (email)
                                      VALUES('$email')
    ");
    if($subscribe){
        //send email=====================================
 $to = $email;
 $subject = 'Subscription';       
 $message = "Hello $email , Thank you for subscribing to our news letters .We are here to serve you";
                     

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";


mail($to,$subject,$message,$headers);
 
        echo "  <script>
        Swal.fire({
          title: ' Subscribed !',
          text: 'Click OK to continue',
          icon: 'success',
          confirmButtonText: 'OK'
        })
            </script>";
    }else{
        echo "  <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            confirmButtonText: 'OK'
          }) </script>";
    }

    }
   
}

?>



    
    <section class="main">
        <div class="seats-header home-header">
            <div class="logo">
             <a href="./"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> 
            </div>
            <ul class="menus">
               
                <li><a style="color: white;" href="./">Booking</a></li>
          
    
            </ul>
            <p class="errorSeats"></p>
        </div>
        <div class="card-image">
           <div class="icon"><i class="fa fa-bus" aria-hidden="true"></i></div>
           <h1 class="headline">How Can We Help ?</h1>
           <h4 class="subtitle">We'd Like To Hear From You</h4>
          
           <div class="after"></div>
        </div>

        <div class="form">
           
            <h2>Contact us</h2>
            
            <form action="" method="post">
                <!-- <div class="form-group error">
                  <p>some errors</p>
                </div> -->
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="" placeholder="Your Email Address" required>
                </div>
               
                <div class="form-group">
                    <label for="">Subject</label>
                    <select name="subject" id="" required placeholder=''>
                        <option value="">-Select Subject-</option>
                        <option value="Ticket_Cancellation">Ticket Cancellation</option>
                        <option value="Ticket_Booking">Ticket Booking</option>
                        <option value="Report_Fraud">Report Fraud</option>
                        <option value="Make_Suggestion">Make Suggestion</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Message</label>
                   <textarea name="message" id="" cols="20" rows="5" placeholder="Write something..." required></textarea>
                </div>
            
                <button name='query' type='submit'>Send</button>
            </form>
        </div>
    
    </section>
    <!-- =============================section threee=============================== -->
    <section id='subscribe' class="subscribe">
    <div class="subscribe-main">
        <div class="subscribe-else">
            
            <form action="" method='post' class="subscribe-form">
               <h4>subscribe to our news letter</h4>
            <p>Lorem ipsum dolor sit amet consectetur.</p> 
            <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name='email' required placeholder="Enter your email address"><button class='subscribe' name='subscribe'>subscribe</button>
         
        </form>
            
        </div>
        <div class="subscribe-image">
            
           <ul class="links">
               <h4>Quick Links</h4>
               <li><a href="support.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact us</a></li>
               <li><a href="cancel.html"><i class="fa fa-refresh" aria-hidden="true"></i> Cancel ticket</a></li>
               <li><a href="#services"><i class="fa fa-info-circle" aria-hidden="true"></i> Services</a></li>
               <li><a href="#subscribe"><i class="fa fa-check-circle-o" aria-hidden="true"></i> subscribe</a></li>
               <br><br> <p>copyrights 2022 transafaris</p>
              
           </ul>
        </div>
     
    </div>
    
</section>
    
</body>
</html>
