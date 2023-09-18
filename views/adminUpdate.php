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
$sqlusers = mysqli_query($conn,"SELECT * FROM subscriptions "); 
$users = mysqli_fetch_all($sqlusers,MYSQLI_ASSOC);

if(isset($_POST['update'])){
 $subject = $_POST['subject'];
 $destination = $_POST['to'];
 $message2 = $_POST['message'];

 if($destination === 'all'){
 // sending to all================================================
 foreach($users as $user){
$to = $user['email'];     
$message = "<h3> $message2 <h3>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";


if(mail($to,$subject,$message,$headers)){
    echo "  <script>
    Swal.fire({
      title: ' Success',
      text: 'Updates Sent successifully',
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

 }else{
    $to = $destination;   
    $message = "<h3> $message2 <h3>";
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
    $headers .= 'From: <transafarissacco@gmail.com>' . "\r\n";
    if(mail($to,$subject,$message,$headers)){
        echo "  <script>
        Swal.fire({
          title: ' Success',
          text: 'Updates Sent successifully',
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

    <div class="admin-container">
        <div class="admin-form">
             
          <form class="addBus" method="post" action="">
              <div class="form-header">
               <h3>Send Updates</h3> 
             <a href="adminBuses.html"> <i class="fa fa-times" style="float: left" aria-hidden="true"></i> </a>  
              </div>
             
          
          
            <div class="form-group">
                <label for="">Reciepient</label>
                <select name="to" id="" required>
                    <option value="">-select reciepient-</option>
                     <option value="all">All</option>
                    <?php foreach($users as $user) : ?>
                        <option value=<?php echo $user['email'] ?> ><?php echo $user['email'] ?></option>
                    <?php endforeach ?>
                   
                </select>
            </div>
            <div class="form-group">
                <label for="">Subject</label>
                <input type="text" name="subject" id="" class="subject" required>
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" id="" class='message' cols="30" rows="10" placeholder="Write a message...." required></textarea>
            </div>
        
            <button type="submit" name="update">Send</button>
         
         
                
        </form>  
        </div>
        
    </div>
</body>
</html>