<?php 
session_start();
$conn = mysqli_connect('localhost','root','','transafarisdb');
    

    if(isset($_GET['status']))
    {      
      
        //* check payment status
        if($_GET['status'] == 'cancelled')
        {
            // echo 'YOu cancel the payment';
            header('Location: ../views/seats.php');
        }
        elseif($_GET['status'] == 'successful')
        {
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: Bearer FLWSECK_TEST-a96c725ac827ecc7feb2cd6b06df7ce5-X"
                ),
              ));
              
              $response = curl_exec($curl);
              
              curl_close($curl);
              
              $res = json_decode($response);
              if($res->status)
              {
                $amount = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                if($amount >= $amountToPay)
                {
                     //success
                     $amount = $_SESSION['price'];
                     $email = $_SESSION['email'];
                     $bus = $_SESSION['bus'];
                     $uid = $_SESSION['uid'];
                     $seatno = $_SESSION['seatno'];
                     $date = $_SESSION['date'];
                     $origin= $_SESSION['origin'];
                     $destination= $_SESSION['destination'];
                     $route= $_SESSION['route'];

                     $sql = mysqli_query($conn,"INSERT INTO bookings (email,bId,uid,seatno,dateBooked,price,origin,destination,route)
                                          VALUES('$email','$bus','$uid','$seatno','$date','$amount','$origin','$destination','$route')
                                 ");
                                 if($sql){
                                    // success
                                  header('location:./ticket.php');
                                 }else{
                                     echo 'not inserted';
                                 }
                }
                else
                {  
                    echo"<script language='javascript'>
                    var alerts  = confirm('Fraud transaction detected');
                    if(alerts == true || alerts == false){
                    
                        window.location.href = '../views/seats.php';
                    }
                
                    </script>
                    ";
                  
                }
              }
              else
              {
                echo"<script language='javascript'>
                var alerts  = confirm('Cannot process your payment click ok to and try again');
                if(alerts == true || alerts == false){
                
                    window.location.href = '../views/seats.php';
                }
            
                </script>
                ";
              }
        }
    }
?>