<?php

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/logout.php');
    }
    //if the above code is false then html below will be displayed

?>


<!-- Header Section Start -->
<header class="header">
   <!-- Logo -->
   <!--<img src="phsi.png" alt="">-->
   <a href="../home.php" class="logo">PHSI</a>
   <!-- Navbar -->
   <nav class="navbar">
      <div id="close-navbar" class="fas fa-times"></div>
      <a href="../home.php">Home</a>
      <div class="dropdown">
         <button class="dropbtn">About PHSI</button>
         <div class="dropdown-content">
            <a href="../history/history.php">History</a>
            <a href="../misvis/misvis.php">Mission & Vision</a>
            <a href="../administration/administration.php">Administration</a>
            <a href="../contact/contact.php">Contact</a>
         </div>
      </div> 
      <a href="../news/news.php">News & Features</a>
      <div class="dropdown">
         <button class="dropbtn">Organizations</button>
         <div class="dropdown-content">
            <a href="../organizations/unesco.php">WMSU Youth Peace Mediators -<br>
             UNESCO Club</a>
            <a href="../organizations/biorisk.php">Biorisk Management and Security</a>
         </div>
      </div> 
      <a href="../event/events.php">Upcoming Events</a>  
   </nav>

   <div class="icons">
      <!--If user is not yet logged in, notification bell, user icon and logout will not show-->
      <?php  if(isset($_SESSION['logged-in'])) { 
      ?>
      <div class="uil uil-bell"><a href=""></a></div>

      <a href="../user/user-profile.php"><img src="../uploads/<?php echo $_SESSION['profile_picture']; ?>" alt=""></a>

      <div class="uil uil-signout"><a href="login/logout.php">Logout</a></div>

      <?php
      }
      ?> 


      <?php  if(!isset($_SESSION['logged-in'])) {   
      ?>
      <div id="account-btn"><a href="../login/login.php">Login</a></div>
      <?php
      }
      ?>
      <div id="menu-btn">Menu</div>
   </div>
</header>
<!-- Header Section End -->





