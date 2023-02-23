<?php
    //resume session here to fetch session values
    session_start();


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
      <!--If user is not ye logged in, notification bell, user icon and logout will now show-->
      <?php  if(isset($_SESSION['logged-in'])) { 
      ?>
      <div class="uil uil-bell"><a href=""></a></div>
      <div class="user">
         <div class="bg-img" style="background-image: url(../images/student-profile/user-icon.png)"></div>
      </div>
      <div class="uil uil-signout"><a href="../home.php">Logout</a></div>
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





