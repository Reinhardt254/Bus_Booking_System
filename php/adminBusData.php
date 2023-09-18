<?php foreach($buses as $bus) :?>

<div class="bus-card">
      <div class="card-details">
            <p class="bus-name">
                <span class="title"><?php echo $bus['name'] ?></span>
                <span class="sub">
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star-half-o" aria-hidden="true"></i>
                </span>
         </p>
            <p class="bus-route"><span class="title"><?php echo $bus['des1'] ?></span><span class="sub"><?php echo $bus['des2'] ?></span></p>
            <p class="bus-depature"><span class="title">Time</span><span class="sub"><?php echo $bus['time'] ?></span></p>
            <p class="bus-depature"><span class="title">Price</span><span class="sub"><?php echo $bus['price'] ?></span></p>
            <p class="bus-seats"><span class="title">Available seats</span><span class="sub"><?php echo $bus['capacity'] ?></span></p>
         <a href="../views/adminSeats.php?bus=<?php echo $bus['bId'] ?>"><button>select</button></a>
            
      </div>
</div>

<?php endforeach ?>    
<!-- ../views/seats.php?bus=<?php echo $bus['bId'] ?> -->

