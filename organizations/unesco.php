<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="../images/logos/unesco.png">
   <title>WMSU Youth Peace Mediators - UNESCO Club</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/org.css">

</head>
<body>
   
<!-- header section starts  -->

<header class="header fixed-top">
   
   <div class="container">

      <div class="row align-items-center justify-content-between">
         <a href="#home" class="logo">WMSU <span>UNESCO Club</span></a>
         <nav class="nav">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#news">News & Features</a>
            <a href="#administration">Administration</a>
            <a href="">Upcoming Events</a>
         </nav>

         <a href="../login/login.php" class="login-btn">Login</a>

         <div id="menu-btn" class="fas fa-bars"></div>

      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">
   <div class="container">
      <div class="row min-vh-100 align-items-center">
         <!--<div class="content text-center text-md-left">
            <h3>let us brighten your smile</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium itaque, quasi aliquam alias tempora voluptatibus.</p>
            <a href="#contact" class="link-btn">make appointment</a>
         </div>-->
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="../images/content-images/unesco-p5.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>about us</span>
            <h3>Ano at Sino Kame?</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam cupiditate vero in provident ducimus. Totam quas labore mollitia cum nisi, sint, expedita rem error ipsa, nesciunt ab provident. Aperiam, officiis!</p>
            <a href="#contact" class="link-btn">Read More</a>
         </div>

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- NEWS AND FEATURES UNESCO -->

<section class="services" id="news">

   <h1 class="heading">News and Features</h1>

   <div class="box-container container">

   <?php
    
    require_once '../classes/unesco_news_model.php';
    
    $news = new News();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($news->fetchAllRecords() as $value){ 
        //start of loop
    ?>

      <div class="box">
         <img src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['news_title']; ?>">
         <h3><?php echo $value['news_title']; ?></h3>
         <a href="" class="login-btn">Read More</a>
      </div>
      <?php $i++; } ?> 
      </div>

   </div>

</section>

<!-- NEWS AND FEATURES UNESCO -->






<!-- process section starts  -->

<section class="event-organizers">

   <h1 class="heading">Administration</h1>

   <div class="box-container container">

   <?php
   require_once '../classes/unesco_administration_model.php';
    
    $administration = new Administration();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($administration->fetchAllRecords() as $value){ 
        //start of loop
    ?>


      <div class="box">
         <img src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['admin_name']; ?>">
         <div class="admin-info">
         <h3><?php echo $value['admin_name'] ?></h3>
         <p><?php echo $value['admin_position'] ?></p>
         </div>
      </div>
      <?php $i++; } ?> 


   </div>
</section>

<!-- process section ends -->

<!-- reviews section starts  -->

<!--<section class="reviews" id="reviews">

   <h1 class="heading"> Our Reviews </h1>

   <div class="box-container container">

      <div class="box">
         <img src="../images/student-profile/jaaf.jpg" alt="">
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, iure? Nemo est aspernatur voluptatum id, laboriosam asperiores iure omnis alias?</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>San Tan</h3>
         <span></span>
      </div>

      <div class="box">
         <img src="../images/student-profile/MIRA.jpg" alt="">
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, iure? Nemo est aspernatur voluptatum id, laboriosam asperiores iure omnis alias?</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>San T. No</h3>
         <span></span>
      </div>

      <div class="box">
         <img src="../images/student-profile/pic-1.png" alt="">
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, iure? Nemo est aspernatur voluptatum id, laboriosam asperiores iure omnis alias?</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Nasan Kana</h3>
         <span></span>
      </div>

   </div>

</section>-->

<!-- reviews section ends -->

<!-- contact section starts  -->

<!--<section class="contact" id="contact">

   <h1 class="heading">make appointment</h1>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>
      <span>your name :</span>
      <input type="text" name="name" placeholder="enter your name" class="box" required>
      <span>your email :</span>
      <input type="email" name="email" placeholder="enter your email" class="box" required>
      <span>your number :</span>
      <input type="number" name="number" placeholder="enter your number" class="box" required>
      <span>appointment date :</span>
      <input type="datetime-local" name="date" class="box" required>
      <input type="submit" value="make appointment" name="submit" class="link-btn">
   </form>  

</section> -->

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p>+123-456-7890</p>
         <p>+111-222-3333</p>
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>our address</h3>
         <p>Executive Building, Western Mindanao State University, Normal Road, Baliwasan, Zamboanga City</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>8:00 AM to 4:00 PM</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <p>wmsu.phsi2021@gmail.com</p>
         <p>wmsu.unesco@gmail.com</p>
      </div>

   </div>

   <div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>WMSU UNESCO Club</span>  </div>

</section>

<!-- footer section ends -->










<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- Swiper Js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- Custom Js file link  -->
<script src="../js/script.js"></script>

</body>
</html>