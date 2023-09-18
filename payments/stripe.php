<?php
session_start();
$conn = mysqli_connect('localhost','root','','transafarisdb');
require_once('../vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_51KpWBMI0vZvSFQyqnJFhaS16acCJ5bC4iU7gMFL6iFQTh8AGjscZQIlcTlcJN68wIgc2cjz2IxYkQPFRGr5XxdKy00c8pfcrs3');
$amount = $_SESSION['price'];
// $email = $_SESSION['email'];
$uid = $_SESSION['uid'];
$price = $amount*100;

$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'kes',
      'product_data' => [
        'name' => 'Transafaris Ticket',
      ],
      'unit_amount' => $price,
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/reservation/payments/success.php',
  'cancel_url' => 'http://localhost/reservation/views/seats.php',
]);

?>

<html>
  <head>
    <title>P</title>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <script>
      var stripe = Stripe('pk_test_51KpWBMI0vZvSFQyqX8WBBvf1cZ8LC6JNmvxbthYxBnOgy6NrFWiPGaJsk9GdPiUXLbtMZlivACoSNqtZ5bXeRhUn00UlMgiLNc');
        stripe.redirectToCheckout({
          sessionId: "<?php echo $session->id; ?>"
        });
    
    </script>
  </body>
</html>