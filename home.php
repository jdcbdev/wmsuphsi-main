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
   
   <!-- Custom css file link  -->
   <link rel="stylesheet" href="css/phsi.css"> 
   <link rel="stylesheet" href="css/modal.css"> 

   <!-- Title and Logo in tab -->
   <link rel="icon" type="image/png" href="images/logos/phsi.png">
   <title>Home | WMSU - Peace and Human Security Institute</title>

</head>
<body>

<!-- Header Section Start -->
<header class="header">
   <!-- Logo -->
   <!--<img src="phsi.png" alt="">-->
   <a href="home.php" class="logo">PHSI</a>
   <!-- Navbar -->
   <nav class="navbar">
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
      <div class="dropdown">
         <button class="dropbtn">Organizations</button>
         <div class="dropdown-content">
            <a href="organizations/unesco.php">WMSU UNESCO Club</a>
            <a href="organizations/biorisk.php">Biorisk Management and Security</a>
         </div>
      </div> 
      <a href="event/events.php">Upcoming Events</a>  
   </nav>

   <div class="icons">
      <!--If user is not yet logged in, notification bell, user icon and logout will not show-->
      <?php  if(isset($_SESSION['logged-in'])) { 
      ?>
      <div class="uil uil-bell"><a href=""></a></div>

      <a href="user/user-profile.php"><img src="uploads/<?php echo $_SESSION['profile_picture']; ?>" alt=""></a>
      <?php
      }
      ?>
      
      <?php  if(isset($_SESSION['logged-in'])) { 
      ?>
      <div class="uil uil-signout"><a href="login/logout.php">Logout</a></div>
      <?php
      }
      ?>

      <?php  if(!isset($_SESSION['logged-in'])) {   
      ?>
      <div id="account-btn"><a href="login/login.php">Login</a></div>
      <?php
      }
      ?>
      <div id="menu-btn">Menu</div>
   </div>
</header>
<!-- Header Section End -->



<?php
   require_once 'carousel/carousel.php';
?>

<?php    if(isset($_SESSION['logged-in'])) { ?>
<!------------------------------------------- Free Content: CALL FOR DONATIONS/VOLUNTEERS/FEATURED ARTICLES Start -------------------------------------------------------------------------------------------->
<section class="free_content">
   <div class="image">
      <img src="images/content-images/unesco-p2.jpg"alt="">
   </div>
   <div class="content">
      <h3 class="about-title">WMSU UNESCO Club Member?</h3>
      <p>As a member of WMSU UNESCO Club, make sure to stay informed about upcoming events and activities by hitting the button below. Don't miss out on the chance to be part of meaningful initiatives and engage with like-minded individuals.</p>
      <a href="#" class="btn">I am a Peace Mediator</a>
   </div>
</section>
<?php } ?>
<!-------------------------------------------  Free Content: CALL FOR DONATIONS/VOLUNTEERS/FEATURED ARTICLES End -------------------------------------------------------------------------------------------->


<section class="home-courses">

   <h1 class="heading" style="font-size: 5rem;color: #41453e;"> CALL FOR ACTIONS</h1>

   <div class="swiper home-courses-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="image">
               <img src="images/content-images/unesco-p3.jpg" alt="">
               <h3>Call for Donations</h3>
            </div>
            <div class="content">
               <h3>Call for Donations</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, ratione?</p>
               <a href="#" class="btn">Donate</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="image">
               <img src="images/content-images/unesco-donations.png" alt="">
               <h3>Call for Volunteers</h3>
            </div>
            <div class="content">
               <h3>Call for Volunteers</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, ratione?</p>
               <a href="#" class="btn">Volunteer</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="image">
               <img src="images/content-images/peace-edukasyon.jpg" alt="">
               <h3>Call for Donations</h3>
            </div>
            <div class="content">
               <h3>Call for Donations</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, ratione?</p>
               <a href="#" class="btn">Donate</a>
            </div>
         </div>

      </div>

   </div>

</section>


<!--------------------------------------------- Announcements Section Start ----------------------------------------------------------------------------->
<section class="announcements">
   <h1 class="heading">News and Features </h1>
   <div class="box-container">
      <div class="box">
         <div class="image">
            <img src="images/content-images/unesco-canton.jpg" alt="">
            <h3>Jan 16, 2023</h3>
         </div>
         <div class="content">
            <h3>In the Light of the Recent Flood in Zamboanga City</h3>
            <!--<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, odit!</p>-->
            <a href="#" class="btn">Read more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/content-images/phsi-dialogue.jpg"  alt="">
            <h3>Nov 26, 2022</h3>
         </div>
         <div class="content">
            <h3>Harnessing our Peace Efforts: Towards Solidarity in Service</h3>
            <!--<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, odit!</p>-->
            <a href="news/news-page.php" class="btn">Read more</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/content-images/unesco-youthleader.png"  alt="">
            <h3>Nov 12, 2022</h3>
         </div>
         <div class="content">
         <h3>2022 UNESCO Club Outstanding Youth Leader (College Level)!</h3>
            <!--<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, odit!</p>-->
            <a href="#" class="btn">Read more</a>
         </div>
      </div>
</section>
<!---------------------------------------------- Announcements Section Start ----------------------------------------------------------------------------------->

<!---------------------------------------------- Organizations Section Start  ------------------------------------------------------------------------------------------->
<section class="organization">
   <h1 class="heading">Organizations</h1>
   <div class="box-container">

      <div class="box" id="unesco">
      <a href="organizations/unesco.php">
         <img src="images/logos/new-unesco.png" alt="">
         <h3>WMSU Youth Peace Mediators - UNESCO Club</h3></a>
         <!--<p>Lorem ipsum</p>-->
      </div>

      <div class="box" id="biorisk">
         <img src="images/logos/biorisk.png" alt="">
         <h3>WMSU Biosafety and Biosecurity Committee</h3>
         <!--<p>Lorem ipsum</p>-->
      </div>
   </div>
</section>
<!----------------------------------------------- Organizations Section End --------------------------------------------------------------------------------->



<!----------------------------------------------- Review Section Start --------------------------------------------------------------------------------->
<section class="reviews">
   <h1 class="heading">Our reviews</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <p>A wonderful experience from this Institute.</p>
            <img src="images/student-profile/pic-1.png" alt="">
            <h3>Arjay Sagdi</h3>
            <div class="label">
               PHSI
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>A wonderful experience from this Institute.</p>
            <img src="images/student-profile/pic-2.jpg" alt="">
            <h3>Arjay Ole</h3>
            <div class="label">
              UNESCO Club
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>A wonderful experience from this Institute.</p>
            <img src="images/student-profile/pic-3.jpg" alt="">
            <h3>Arjay Orias</h3>
            <div class="label">
            UNESCO Club
            </div>
         </div>
      </div>
   </div>
   <div class="swiper-pagination"></div>
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
          <a href="#" class="link">WMSU Biosafety and Biosecurity Committee</a>
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
    <div class="credit"><span>PHSI</span> | All Rights reserved! </div>
 </section>
 <!-- Footer section Ends -->

 <!-- Swiper Js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- test  -->

<!-- Custom Js file link  -->

<script src="js/script.js"></script>

</body>
</html>