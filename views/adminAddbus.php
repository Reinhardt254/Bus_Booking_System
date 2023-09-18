
<?php
$conn = mysqli_connect('localhost','root','','transafarisdb');
$sql = mysqli_query($conn,"SELECT * FROM cities");
$cities = mysqli_fetch_all($sql,MYSQLI_ASSOC);


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
             
          <form class="addBus" action="">
              <div class="form-header">
               <h3>Add Bus</h3> 
             <a href="adminBuses.html"> <i class="fa fa-times" style="float: left" aria-hidden="true"></i> </a>  
              </div>
             
              <p class="addbus_error"></p>
          
            <div class="form-group">
                <label for="">Bus name</label>
                <input class="bus_name" type="text" id=""  name="name" required placeholder='eg KVM 126D'>
            </div>
            
            <div class="form-group">
                <label for="">Origin</label>
                <select class="origin" name="origin" id="" required>
                  <option value="">Traveling From</option>
                  <?php  foreach($cities as $city) : ?>

                    <option value= <?php echo $city['value'] ?> ><?php echo $city['name'] ?></option>

                    <?php  endforeach ?>
                 
                </select>
            </div>
            <div class="form-group">
                <label for="">Destination</label>
                <select class="destination" name="destination" id="" required>
                  <option value="">Traveling to</option>
                
                   <?php  foreach($cities as $city) : ?>

                    <option value= <?php echo $city['value'] ?> ><?php echo $city['name'] ?></option>

                    <?php  endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input class="price" type="number" name="price"  required>
            </div>
            <div class="form-group">
                <label for="">Capacity</label>
                <input class="capacity" type="number" name="capacity" id="" min="30" required>
            </div>
            <div class="form-group">
                <label for="">Time</label>
                <input class="time" type="time" name="time" id="" required>
            </div>
            <button>Submit</button>
         
         
                
        </form>  
        </div>
        
    </div>
    <script src="js/adminAddBus.js"></script>
</body>
</html>