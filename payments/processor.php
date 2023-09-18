
<?php
session_start();
$conn = mysqli_connect('localhost','root','','transafarisdb');
            
            pay();
       function pay(){
            $amount = $_SESSION['price'];
            $email = $_SESSION['email'];
            $uid = $_SESSION['uid'];
       
 
            $request = [
                'tx_ref' => time(),
                'amount' => $amount,
                // 'phone'  => 0114204414,
                'currency' => 'KES',
                'payment_options' => 'mobile money',
                'redirect_url' => 'http://localhost/reservation/payments/payrequest.php',
                'customer' => [
                    // 'phone_number'=>25454709929220,
                    'email' => $email,
                    'name' => $email
                ],
                'meta' => [
                    'price' => $amount
                ],
                'customizations' => [
                    'title' => 'Paying  for transafaris',
                    'description' => ''
                ]
            ];
        
            //* Ca;; f;iterwave emdpoint
            $curl = curl_init();
        
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($request),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer FLWSECK_TEST-a96c725ac827ecc7feb2cd6b06df7ce5-X',
                'Content-Type: application/json'
            ),
            ));
        // FLWSECK_TEST-8dd37e94dbc864a3a77a4c5879376585-X
            $response = curl_exec($curl);
            // echo $response;
        
            curl_close($curl);
            
            $res = json_decode($response);
            // if(!$res){
            //     header('Location: ../views/seats.php ');
            // }
            if($res->status == 'success')
            {
                $link = $res->data->link;
                header('Location: '.$link);
            }
            else
            { 
                echo"<script language='javascript'>
                var alerts  = confirm('We cannot process your payment Please try again ');
                if(alerts == true || alerts == false){
                
                   window.location.href = '../views/seats.php';
                }
            
                </script>
                ";
            }
        
        


       }     
           
 
    
        