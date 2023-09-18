<?php

session_start();

$conn = mysqli_connect('localhost','root','','transafarisdb');

$bus = $_GET['busid'];

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    </head>
<body>
    <div class="admin-container">
        <div class="admin-form">
             
          <form class="addRoute" action="../php/generateReport.php" method="post">
              <div class="form-header">
               <h3>Generate Report</h3>
             <a href="adminBuses.html"> <i class="fa fa-times" style="float: left" aria-hidden="true"></i> </a>  
              </div>
             
            <p class="addroute_error"></p>
          
            <div class="form-group">
                <label for="">Month</label>
               <select name="month" id="" class="month">
                   <option value="01">January</option>
                   <option value="02">February</option>
                   <option value="03">March</option>
                   <option value="04">April</option>
                   <option value="05">May</option>
                   <option value="06">June</option>
                   <option value="07">July</option>
                   <option value="08">August</option>
                   <option value="09">September</option>
                   <option value="10">October</option>
                   <option value="11">November</option>
                   <option value="12">December</option>
               </select>
            </div>
          <input type="number" name="busid" id="" value="<?php echo $bus ?>" hidden>
            <button class='submit'>Generate</button>
         
         
                
        </form>  
        </div>
        
    </div>
    <!-- <script src="js/adminAddRoute.js"></script> -->
</body>
</html>