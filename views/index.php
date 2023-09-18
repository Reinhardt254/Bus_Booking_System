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
$d=strtotime("tomorrow");
$min =  date("Y-m-d", $d);

$d2=strtotime("+3 Days");
$max =  date("Y-m-d", $d2);

$sql = mysqli_query($conn,"SELECT * FROM cities");
$cities = mysqli_fetch_all($sql,MYSQLI_ASSOC);


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
    <div   class="seats-header home-header">
                 <div class="logo">
                  <!-- <i class="fa fa-arrow-left" aria-hidden="true"></i>  -->
                </div> 
                <ul class="menus">
                    <li><a style="color:white" href="cancel.html">Cancel</a></li>
                    <li><a style="color:white" href="support.php">Support</a></li>
                   
                </ul>
            </div>
        <div class="card-image">
           <div class="icon"><i class="fa fa-bus" aria-hidden="true"></i></div>
           <h1 class="headline">Experience travel in style</h1>
           <h4 class="subtitle">Experience luxury travel across Mombasa, Nairobi,Meru <br> Kitale & Kakamega</h4><br><br>
           <a class="getStarted" href="#booking">GET STARTED</a><br><br>
          <!-- <marquee class="marque" behavior="" direction="">  -->
              <div class="testimonials">
            <div class="testimonial">
                <img src="images/bus2.jpg" alt="">
            </div>
            
            <div class="testimonial">
                <img src="images/bus2.jpg" alt="">
            </div>
            
            <div class="testimonial">
                <img src="images/bus2.jpg" alt="">
            </div>
            
            <div class="testimonial">
                <img src="images/bus2.jpg" alt="">
            </div>
            <div class="reviews">
                <div class="stars">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                 </div>
                <p class="review">from 200+ reviews</p>
            </div>
            
        </div>
    <!-- </marquee> -->
           <div class="after"></div>
        </div>

        <div class="form" id="booking">
           
            <form class="form_user_route" action="">
            <!-- <h3 class='heading'>Get a ticket</h3> -->
                  <p class="error"></p>
               
                <div class="form-group">
                    <label for="">Origin</label>
                    <select class="origin" name="origin" id="" required>
                     
                      <option value="">Travelling From</option>
                         <?php  foreach($cities as $city) : ?>

                       <option value= <?php echo $city['value'] ?> ><?php echo $city['name'] ?></option>

                          <?php  endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                 <input class="username" type="text" name="username" value="" hidden>
                </div>
               
                <div class="form-group">
                    <label for="">Destination</label>
                    <select class="destination" name="destination" id="" required>
                      <option value="">Travelling to</option>
                      <?php  foreach($cities as $city) : ?>

                    <option value= <?php echo $city['value'] ?> ><?php echo $city['name'] ?></option>

                    <?php  endforeach ?>
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="">Travelling Date</label>
                   <input type="date" class="date" name="date" id="" min="<?php echo $min ?>" max="<?php echo $max ?>" required>
                </div>
                <button>Search Bus</button>
            </form>
        </div>
</section>
<!-- =============================section twoo=============================== -->
<section id='services' class="subsection">
     <h2 class="heading">Why choose Transafaris ?</h2>
   <div class="subsection-cards">
       <div class="subsection-card one">
           <div class="icon">
           <i class="fa fa-bolt" aria-hidden="true"></i>
           </div>
           <div class="subsection-subheading">
               <h5>Fast & easy booking</h5>
           </div>
           <div class="subsection-description">
               <p>Our system is easy and give faster response,this enable passengers to book easily without encountering difficulties</p>
           </div>

       </div>
       <div class="subsection-card two">
           <div class="icon">
           <i class="fa fa-map-marker" aria-hidden="true"></i>
           </div>
           <div class="subsection-subheading">
               <h5>many pickup locations</h5>
           </div>
           <div class="subsection-description">
               <p>Mombasa,Nairobi,Nakuru,Narok,<br>Lodwar,Kakamega,Kericho,Eldoret,<br>Kisumu,Machakos,Meru,Lamu,Garissa<br>Moyale,Embu,Nyeri,Kapenguria</p>
           </div>

       </div>
       <div class="subsection-card three">
           <div class="icon">
           <i class="fa fa-smile-o" aria-hidden="true"></i>
           </div>
           <div class="subsection-subheading">
               <h5>satified customers</h5>
           </div>
           <div class="subsection-description">
               <p>John Kaloko:
                   I used this system <br>It gave me faster response and<br> I was able to confirm my journey in time</p>
           </div>

       </div>
      

   </div>
</section>
<!-- =============================section threee=============================== -->
<section id='subscribe' class="subscribe">
    <div class="subscribe-main">
        <div class="subscribe-else">
            
            <form action="" method='post' class="subscribe-form">
               <h4>subscribe to our news letter</h4>
            <p>Subscribers recieve regular updates</p> 
            <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name='email' required placeholder="Enter your email address"><button class='subscribe subbtn' name='subscribe'>subscribe</button>
         
        </form>
            
        </div>
        <div class="subscribe-image">
            
           <ul class="links">
               <h4>Quick Links</h4>
               <li><a href="support.php"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact us</a></li>
               <li><a href="cancel.html"><i class="fa fa-refresh" aria-hidden="true"></i> Cancel ticket</a></li>
              
               <li><a href="#subscribe"><i class="fa fa-check-circle-o" aria-hidden="true"></i> subscribe</a></li>
               <br><br> <p>copyrights 2022 transafaris</p>
              
           </ul>
        </div>
     
    </div>
    
</section>

    
    <script src="js/index.js"></script>
</body>
</html>