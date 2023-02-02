<?php
    //resume session here to fetch session values
    session_start();


?>


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
            "firstname" => 'Arjay',
            "middlename" => 'Lumibot',
            "lastname" => 'Malaga',
            "email" => 'arjay@gmail.com',
            "address" => 'Guiwan, Zamboanga City',
            "gender" => 'Male',
            "role" => 'admin',
            "username" => 'arjay',
            "password" => 'arjay'
        ),
        "user2" => array(
            "firstname" => 'Jericho',
            "middlename" => 'Bello',
            "lastname" => 'Sagdi',
            "email" => 'jericho@gmail.com',
            "address" => 'San Roque, Zamboanga City',
            "gender" => 'Male',
            "role" => 'admin',
            "username" => 'jericho',
            "password" => 'jericho'
        ),
        "user3" => array(
            "firstname" => 'Kaitlyn June',
            "middlename" => 'Quimbo',
            "lastname" => 'Mira',
            "email" => 'kaitlyn@gmail.com',
            "address" => 'Pasonance, Zamboanga City',
            "gender" => 'Female',
            "role" => 'admin',
            "username" => 'kaitlyn',
            "password" => 'kaitlyn'
        ),
        "user4" => array(
            "firstname" => 'Bennett',
            "middlename" => 'Gelacio',
            "lastname" => 'Chan',
            "email" => 'bennett@gmail.com',
            "address" => 'Curuan, Zamboanga City',
            "gender" => 'Male',
            "role" => 'admin',
            "username" => 'ben',
            "password" => 'ben'
        ),
        "user5" => array(
            "firstname" => 'Hadzramar',
            "middlename" => 'Iblao',
            "lastname" => 'Jaafar',
            "email" => 'hadzramar@gmail.com',
            "address" => 'Mampang, Zamboanga City',
            "gender" => 'Male',
            "role" => 'normal_user',
            "username" => 'hadz',
            "password" => 'hadz'
        ),
        "user6" => array(
            "firstname" => 'Angelica',
            "middlename" => 'Deoric',
            "lastname" => 'Deoric',
            "email" => 'angelica@gmail.com',
            "address" => 'Town, Zamboanga City',
            "gender" => 'Female',
            "role" => 'normal_user',
            "username" => 'angelica',
            "password" => 'angelica'
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
                $_SESSION['user_role'] = $value['role'];
                //display the appropriate dashboard page for user
                if($value['role'] == 'admin'){
                    header('location: admin/dashboard.php');
                }else{
                    header('location: admin/dashboard1.php');
                }
            }
        }
        //set the error message if account is invalid
        $error = 'Incorrect Account Credentials! Try again.';
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
   <form class="login-form active" id="login-form" action="home.php" method="post">

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
         echo '<div><p class="error" style="color: red;font-size: 16px;margin-top: 15px;">'.$error.'</p></div>';
      
      }
      ?>

   </form>

   <form class="register-form" action="">
      <h3>Register now</h3>
      <input type="text" placeholder="Enter your firstname" class="box">
      <input type="text" placeholder="Enter your middlename" class="box">
      <input type="text" placeholder="Enter your lastname" class="box">
      <input type="email" placeholder="Enter your email" class="box">
      <input type="address" placeholder="Enter your address" class="box">
      <input type="password" placeholder="Enter your password" class="box">
      <input type="password" placeholder="Confirm your password" class="box">
      <input type="submit" value="Register now" name="register" class="btn">
   </form>
</div>
</div>
<!-- Account Form Section End  -->



