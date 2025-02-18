   <?php
    //resume session here to fetch session values
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Arjay L. Malaga">

   <!-- Font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- Swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   
   <!-- Custom IconScunt for this template-->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <!-- fontawesome -->
   <script src="https://kit.fontawesome.com/30ff5f2a0c.js" crossorigin="anonymous"></script>
   
   <!-- Custom css file link  -->
   <link rel="stylesheet" href="css/phsi.css"> 
   <link rel="stylesheet" href="css/modal.css"> 

   <!-- Title and Logo in tab -->
   <link rel="icon" type="image/png" href="images/logos/phsi.png">
   <title>Home | WMSU - Peace and Human Security Institute</title>

</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-sharp fa-solid fa-angle-up"></i></button>

<script>
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  // Calculate the distance to scroll
  const scrollDistance = document.documentElement.scrollTop || document.body.scrollTop;
  
  // Divide the distance into smaller increments
  const scrollStep = Math.PI / (500 / 15);

  // Create a variable to keep track of the current scroll position
  let scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

  // Scroll the page up until the top of the document is reached
  const scrollInterval = setInterval(function() {
    // Calculate the new scroll position
    scrollPosition -= scrollStep * scrollDistance;
    
    // Check if the top of the document has been reached
    if (scrollPosition <= 0) {
      // Stop scrolling
      clearInterval(scrollInterval);
      // Set the scroll position to 0 to ensure accuracy
      scrollPosition = 0;
    }
    
    // Scroll the page up
    document.documentElement.scrollTop = scrollPosition;
    document.body.scrollTop = scrollPosition;
  }, 15);
}

</script>

<!-- Header Section Start -->
<header class="header">
   <!-- Logo -->
   <div>
      <img class="banner_logo" src="bannerlogo.png" alt="" style="width: 100%; border: none;border-radius: 0; margin: auto;">
   </div>
   <!-- Navbar -->
   <nav class="navbar" style="margin-left: auto;">
      <div id="close-navbar" class="fas fa-times"></div>
      <a href="home.php">Home</a>
      <div class="dropdown">
         <button class="dropbtn">About PHSI</button>
         <div class="dropdown-content">
            <a href="history/history.php">History</a>
            <a href="misvis/misvis.php">Mission & Vision</a>
            <a href="administration/administration.php">Administration</a>
            <a href="contact/contact.php">Contact</a>
         </div>
      </div> 
      <a href="news/news.php">News & Features</a>
      <a href="event/events.php">Upcoming Events</a>  

      <?php  if(!isset($_SESSION['logged-in'])) {   
      ?>
      <a href="login/login.php" style="margin-right: auto; color: #107869;">Login</a>
      <?php
      }
      ?>


   </nav>

   <div class="icons">
      <!--If user is not yet logged in, notification bell, user icon and logout will not show-->
      <?php  if(isset($_SESSION['logged-in'])) { 
      ?>
      <!--<div class="uil uil-bell"><a href=""></a></div>-->

      <a href="user/user-profile.php"><img src="uploads/<?php echo $_SESSION['profile_picture']; ?>" alt=""></a>
      <?php
      }
      ?>
      
      <?php  if(isset($_SESSION['logged-in'])) { 
      ?>
      <div>
         <a href="login/logout.php"><i class="uil uil-signout"></i></a>
      </div>
      <?php
      }
      ?>


      <!--<div id="menu-btn">Menu</div>-->
      <div id="menu-btn">
         <a><i class="uil uil-bars" style="font-size: 30px;"></i></a>
      </div>
   </div>
</header>
<!-- Header Section End -->



<?php
   require_once 'carousel/carousel.php';
?>



<section class="free_content">
   <div class="image">
      <img src="images/content-images/phsi-p1.jpg"alt="">
   </div>
   <div class="content">
      <h3 class="about-title">About Us</h3>
      <p>Western Mindanao State University (WMSU) created the Center for Peace and Development (CPD) in January 2000, to generate well-rounded and productive people for the region, ensuring the good welfare of the society grounded on democratic and peaceful initiative.</p>

      <p>Today, under Dr. Ma. Carla A. Ochotorena, the office takes the lead in engaging WMSU in the government-led peace efforts to be the main protagonist in peace education and research on the resolution of local conflicts.</p>
   </div>
</section>



<!--<section class="home-courses">

   <h1 class="heading" style="font-size: 5rem;color: #41453e;"> CALL FOR ACTIONS</h1>

   <div class="swiper home-courses-slider">

      <div class="swiper-wrapper">
   <?php
    
    require_once 'classes/phsi_action_model.php';
    
    $action = new Action();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($action->fetchAllRecords() as $value){ 
        //start of loop
    ?>
         <div class="swiper-slide slide">
            <div class="image">
               <img src="uploads/<?php echo $value['filename']; ?>" alt="">
               <h3><?php echo $value['action_type'] ?></h3>
            </div>
            <div class="content">
               <h3><?php echo $value['action_type'] ?></h3>
               <p><?php echo $value['title'] ?></p>
               <a href="phsi_action/action-page.php?id=<?php echo $value['id']; ?>" class="btn">View Details</a>
            </div>
         </div>

         <?php $i++;  } ?>  

      </div>   

   </div>

</section>-->




<!--------------------------------------------- Announcements Section Start ----------------------------------------------------------------------------->
<section class="announcements" style="background: #f9f9f9;">
   <h1 class="heading">News and Features </h1>
   <div class="box-container">

      <?php 
      require_once 'news/news_model.php';
      $news = new News();
      // Fetch the most recent 3 records from the database
      $news_list = $news->fetchRecentRecords(3);
      // Loop through each news article in the list
      foreach ($news_list as $key => $value) {
         // Display each news article in a box
         // Float the first news article to the right, and the rest to the left
         $float_direction = $key == 0 ? "right" : "left";
      ?> 
      <div class="box" style="float: <?php echo $float_direction; ?>;">
         <div class="image">
            <img src="uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['news_title']; ?>">
            <h3><?php echo $value['created_at']; ?></h3>
         </div>
         <div class="content">
            <h3><?php echo $value['news_title']; ?></h3>
            <a href="news/news-page.php?id=<?php echo $value['id']; ?>" class="btn">Read more</a>
         </div>
      </div>
      <?php } ?>
   </div>
</section>
<!---------------------------------------------- Announcements Section Start ----------------------------------------------------------------------------------->

<!---------------------------------------------- Organizations Section Start  ------------------------------------------------------------------------------------------->
<!--<section class="organization">
   <h1 class="heading">Organizations</h1>
   <div class="box-container">

      <div class="box" id="unesco">
      <a href="organizations/unesco.php">
         <img src="images/logos/new-unesco.png" alt="">
         <h3>WMSU Youth Peace Mediators - UNESCO Club</h3></a>
      </div>

      <div class="box" id="biorisk">
         <img src="images/logos/biorisk.png" alt="">
         <h3>WMSU Biosafety and Biosecurity Committee</h3>-->
         <!--<p>Lorem ipsum</p>
      </div>
   </div>
</section>-->
<!----------------------------------------------- Organizations Section End --------------------------------------------------------------------------------->



<!----------------------------------------------- Review Section Start --------------------------------------------------------------------------------->
<!--<section class="reviews">
   <h1 class="heading">Our reviews</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <p>A wonderful experience from this Institute.</p>
            <img src="images/student-profile/pic-1.png" alt="">
            <h3>Arjay Sagdi</h3>
            <div class="label">
               Student
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>A wonderful experience from this Institute.</p>
            <img src="images/student-profile/pic-2.jpg" alt="">
            <h3>Arjay Ole</h3>
            <div class="label">
              Alumni & Employee
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>A wonderful experience from this Institute.</p>
            <img src="images/student-profile/pic-3.jpg" alt="">
            <h3>Arjay Orias</h3>
            <div class="label">
            Employee
            </div>
         </div>
      </div>
   </div>
   <div class="swiper-pagination"></div>
</section>-->

<section class="contact">

   <h1 class="heading"> Get in touch </h1>

   <div class="icons-container">
    
    <div class="icons">
         <i class="fas fa-map"></i>
         <h3>Location :</h3>
         <p>Executive Building, Western Mindanao State University, Normal Road, Baliwasan, Zamboanga City</p>
      </div>

      <div class="icons">
         <i class="fas fa-phone"></i>
         <h3>Phone :</h3>
         <p>09171254009</p>
         <p>09056088968</p>
         <p>09178881897</p>
      </div>

      <div class="icons">
         <i class="fas fa-envelope"></i>
         <h3> Email : </h3>
         <p>wmsu.phsi2021@gmail.com<p>
      </div>

   </div>



   <div class="row">
   <div class="mapouter">
    <div class="gmap_canvas">
        <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=662&amp;height=340&amp;hl=en&amp;q=Executive Building, Western Mindanao State University, Normal Road, Baliwasan, Zamboanga City&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
        </iframe><a href="https://www.gachacute.com/">Download</a></div>
            <style>.mapouter{position:relative;text-align:right;width:50%;height:500px;}
            .gmap_canvas {overflow:hidden;background:none!important;width:100%;height:340px;}
            .gmap_iframe {height:340px!important;}
            </style>
            </div>

      <form action="home.php" method="post">
         <h3>Send us a message</h3>
         <input type="text" placeholder="Name" class="box" required>
         <input type="email" placeholder="Email" class="box" required>
         <input type="text" placeholder="Subject" class="box" required>
         <textarea name="message" class="box" placeholder="Message" id="" cols="30" rows="10" required></textarea>
         <input type="submit" value="Send message" class="btn">
      </form>

   </div>   

</section>

<!----------------------------------------------- Review Section End --------------------------------------------------------------------------------->

<!-- Footer Section Starts  -->
<section class="footer">
    <div class="box-container">
 
       <div class="box">
          <h3>Quick links</h3>
          <a href="#" class="link">Home</a>
          <a href="#" class="link">About PHSI</a>
          <a href="#" class="link">News and Features</a>
          <a href="#" class="link">Organizations</a>
          <a href="#" class="link">Upcoming Events</a>
       </div>
 
       <div class="box">
          <h3>PHSI</h3>
          <a href="#" class="link">History</a>
          <a href="#" class="link">Mission & Vision</a>
          <a href="#" class="link">Administrations</a>
          <a href="#" class="link">Contact</a>
       </div>
 
       <div class="box">
          <h3>Organizations</h3>
          <a href="#" class="link">WMSU Youth Peace Mediators - UNESCO Club</a>
       </div>
 
       <div class="box">
          <h3>Social Links</h3>
          <div class="share">
             <a href="#" class="fab fa-facebook-f"></a>
             <a href="#" class="fab fa-twitter"></a>
             <a href="#" class="fab fa-instagram"></a>
             <a href="#" class="fab fa-youtube"></a>
          </div>
       </div>
 
    </div>
    <!--<div class="credit"><span>PHSI</span> | All Rights reserved! </div>-->
 </section>
 <!-- Footer section Ends -->

 <!-- Swiper Js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- test  -->

<!-- Custom Js file link  -->

<script src="js/script.js"></script>

</body>
</html>