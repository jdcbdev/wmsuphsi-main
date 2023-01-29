<?php
    //we start session since we need to use session values
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
   <link rel="stylesheet" href="./css/phsi.css">

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
            <a href="history.php">History</a>
            <a href="misvis.php">Mission & Vision</a>
            <a href="administration.php">Administration</a>
            <a href="contact.php">Contact</a>
         </div>
      </div> 
      <a href="news.php">News & Features</a>
      <div class="dropdown">
         <button class="dropbtn">Organizations</button>
         <div class="dropdown-content">
            <a href="unesco.php">WMSU Youth Peace Mediators -<br>
             UNESCO Club</a>
            <a href="biorisk.php">Biorisk Management and Security</a>
         </div>
      </div> 
      <a href="events.php">Upcoming Events</a>
   </nav>

   <div class="icons">
      <div id="account-btn" >Login</div>
      <div id="menu-btn" class="fas fa-bars">Menu</div>
   </div>
</header>
<!-- Header Section End -->



<?php
    //creating an array for list of users can login to the system
    $accounts = array(
        "user1" => array(
            "firstname" => 'Jaydee',
            "lastname" => 'Ballaho',
            "email" => 'jaydee@gmail.com',
            "type" => 'admin',
            "username" => 'jaydee',
            "password" => 'jaydee'
        ),
        "user2" => array(
            "firstname" => 'Flower',
            "lastname" => 'Violet',
            "email" => 'flower@gmail.com',
            "type" => 'staff',
            "username" => 'flower',
            "password" => 'flower'
        ),
        "user3" => array(
            "firstname" => 'Arjay',
            "lastname" => 'Malaga',
            "email" => 'arjay@gmail.com',
            "type" => 'admin',
            "username" => 'arjay',
            "password" => 'arjay'
        ),
        "user4" => array(
            "firstname" => 'Marlon',
            "lastname" => 'Grande',
            "email" => 'marlon@gmail.com',
            "type" => 'admin',
            "username" => 'marlon',
            "password" => 'marlon'
        ),
        "user5" => array(
            "firstname" => 'Lucy',
            "lastname" => 'Felix',
            "email" => 'lucy@gmail.com',
            "type" => 'staff',
            "username" => 'lucy',
            "password" => 'lucy'
        )
    );
    if(isset($_POST['username']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        foreach($accounts as $keys => $value){
            //check if the username and password match in the array
            if($username == $value['username'] && $password == $value['password']){
                //if match then save username, fullname and type as session to be reused somewhere else
                $_SESSION['logged-in'] = $value['username'];
                $_SESSION['fullname'] = $value['firstname'] . ' ' . $value['lastname'];
                $_SESSION['user_type'] = $value['type'];
                //display the appropriate dashboard page for user
                if($value['type'] == 'admin'){
                    header('location: admin/dashboard.php');
                }else{
                    header('location: admin/dashboard1.php');
                }
            }
        }
        //set the error message if account is invalid
        $error = 'Invalid username/password. Try again.';
    }
?>

<!-- Account Form Section Start  -->
<div class="account-form">
   <div id="close-form" class="fas fa-times"></div>
   <div class="buttons">
      <span class="btn active login-btn">Login</span>
      <span class="btn register-btn">Register</span>
   </div>
   <div class="forms-container" style="justify-content: center;display: grid; ">
   <form class="login-form active" action="home.php" method="post">

      <h3>Login now</h3>

      <label for="username"></label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required class="box">

      <label for="password"></label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required class="box">

      <div class="flex">
         <input type="checkbox" name="" id="remember-me">
         <label for="remember-me">Remember me</label>
         <a href="#">Forgot password?</a>
      </div>

      <input type="submit" value="Login now" name="login" class="btn">

      <?php
      //Display the error message if there is any. 
      if(isset($error)){
         echo '<div><p class="error">'.$error.'</p></div>';
      }
      ?>

   </form>

   <form class="register-form" action="">
      <h3>Register now</h3>
      <input type="email" placeholder="Enter your email" class="box">
      <input type="password" placeholder="Enter your password" class="box">
      <input type="password" placeholder="Confirm your password" class="box">
      <input type="submit" value="Register now" name="register" class="btn">
   </form>
</div>
</div>
<!-- Account Form Section End  -->

<!-- Home Section Start  -->
<section class="home">
   <div class="swiper home-slider">
      <div class="swiper-wrapper">
         <!-- PHSI Carousel Start -->
         <section class="swiper-slide slide"  style="background: url(images/carousel-images/phsi-carousel.jpg) no-repeat;">
            <div class="content" id="unesco_content">
               <h3>Peace and Human Security Institute</h3>
               <p>Peace is more than 
                  the absence of war, 
                  it is living together 
                  with our differences – 
                  of sex, race, language, 
                  religion or culture – while 
                  furthering universal respect 
                  for justice and human rights 
                  on which such coexistence depends
                  <br>
                  – Tap Tant, UNESCO</p>
               <a href="#" class="btn">Read more</a>
            </div>
         </section>
         <!-- PHSI Carousel End -->

         <!-- UNESCO Carousel Start -->
         <section class="swiper-slide slide" style="background: url(images/content-images/unesco-outstanding.jpg) no-repeat;">
            <!--<div class="content">
               <h3>WMSU Youth Peace Mediators - <br>
                  UNESCO Club</h3>
               <p>Peace comes from being able to contribute the best that we have, 
                  and all that we are, toward creating a world that supports everyone. 
                  But it is also securing the space for others to contribute the best 
                  that they have and all that they are.</p>
               <a href="#" class="btn">Read more</a>
            </div>-->
         </section>
         <!-- UNESCO Carousel End -->
      </div>
      <!--Next/Prev Carousel Button-->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!--Current Carousel 3 dots-->
      <div class="swiper-pagination"></div>
   </div>
</section>
<!-- Home Section End  -->

<!------------------------------------------- Free Content: CALL FOR DONATIONS/VOLUNTEERS/FEATURED ARTICLES Start -------------------------------------------------------------------------------------------->
<section class="free_content">
   <div class="image">
      <img src="images/content-images/unesco-donations.png"alt="">
   </div>
   <div class="content">
      <h3 class="about-title">Share and Save Life</h3>
      <p>WMSU Youth Peace Mediator-UNESCO Club together with it's partnered organization: Rotaract Club of Metro Zamboanga, Jovenes Allianza De Zamboanga (JADZ), WMSU - Political Science Society (PSS) and Arts for Peace Education CALLS FOR DONATION for the affected individuals and families that happened yesterday (January 11, 2023) due to flash floods. This CALL FOR DONATION was supported by Western Mindanao State University and Peace and Human Security Institute office (PHSI). <br> <br>
      We are knocking on your hearts to help those who are affected. Let us remind them that HOPE is still PRESENT.
      </p>
      <a href="callfordonations.php" class="btn">I want to donate</a>
   </div>
</section>
<!-------------------------------------------  Free Content: CALL FOR DONATIONS/VOLUNTEERS/FEATURED ARTICLES End -------------------------------------------------------------------------------------------->



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
            <a href="#" class="btn">read more</a>
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
            <a href="news-page.php" class="btn">read more</a>
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
            <a href="#" class="btn">read more</a>
         </div>
      </div>
</section>
<!---------------------------------------------- Announcements Section Start ----------------------------------------------------------------------------------->

<!---------------------------------------------- Organizations Section Start  ------------------------------------------------------------------------------------------->
<section class="organization">
   <h1 class="heading">Organizations</h1>
   <div class="box-container">

      <div class="box" id="unesco">
         <img src="./images/logos/unesco.png" alt="">
         <h3>WMSU Youth Peace Mediators - UNESCO Club</h3>
         <!--<p>Lorem ipsum</p>-->
      </div>

      <div class="box" id="biorisk">
         <img src="./images/logos/biorisk.png" alt="">
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

<!-- Custom Js file link  -->
<script src="js/script.js"></script>

</body>
</html>