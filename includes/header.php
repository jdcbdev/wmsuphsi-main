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
      <div id="account-btn">Login</div>
      <div id="menu-btn" class="fas fa-bars">Menu</div>
   </div>
</header>
<!-- Header Section End -->

<!-- Account Form Section Start  -->
<div class="account-form">
   <div id="close-form" class="fas fa-times"></div>
   <div class="buttons">
      <span class="btn active login-btn">Login</span>
      <span class="btn register-btn">Register</span>
   </div>
   <div class="forms-container" style="justify-content: center;display: grid; ">
   <form class="login-form active" action="">
      <h3>Login now</h3>
      <input type="email" placeholder="Enter your email" class="box">
      <input type="password" placeholder="Enter your password" class="box">
      <div class="flex">
         <input type="checkbox" name="" id="remember-me">
         <label for="remember-me">Remember me</label>
         <a href="#">Forgot password?</a>
      </div>
      <input type="submit" value="Login now" class="btn">
   </form>

   <form class="register-form" action="">
      <h3>Register now</h3>
      <input type="email" placeholder="Enter your email" class="box">
      <input type="password" placeholder="Enter your password" class="box">
      <input type="password" placeholder="Confirm your password" class="box">
      <input type="submit" value="Register now" class="btn">
   </form>
</div>
</div>
<!-- Account Form Section End  -->



