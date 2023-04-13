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
      <!--<div class="dropdown">
         <button class="dropbtn">Organizations</button>
         <div class="dropdown-content">
            <a href="organizations/unesco.php">WMSU UNESCO Club</a>
            <a href="organizations/biorisk.php">Biorisk Management and Security</a>
         </div>
      </div> -->
      <!--<a href="organizations/unesco.php">WMSU UNESCO Club</a> -->
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
      <div>
         <a href="login/logout.php"><i class="uil uil-signout"></i></a>
      </div>
      <?php
      }
      ?>

      <?php  if(!isset($_SESSION['logged-in'])) {   
      ?>
      <div id="account-btn"><a href="login/login.php">Login</a></div>
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

<!-------------------------------------------  Free Content: CALL FOR DONATIONS/VOLUNTEERS/FEATURED ARTICLES End -------------------------------------------------------------------------------------------->


<section class="home-courses">

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
               <a href="phsi_action/action-page.php?id=<?php echo $value['id']; ?>" class="btn">Donate</a>
            </div>
         </div>

         <?php $i++;  } ?>  

      </div>

   </div>

</section>

<?php } ?>


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

      <!--<div class="box" id="biorisk">
         <img src="images/logos/biorisk.png" alt="">
         <h3>WMSU Biosafety and Biosecurity Committee</h3>-->
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