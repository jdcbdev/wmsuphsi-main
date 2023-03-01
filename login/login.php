<?php
     require_once '../classes/user.class.php';
     require_once '../tools/functions.php';
    //resume session here to fetch session values
    session_start();
    $page_title = 'Login | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>


<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
       
        $user = new Users;
        $user -> username = htmlentities($_POST['username']); 
        $user -> password = htmlentities($_POST['password']); 

        $output = $user -> login();

        if ($output) {
            // CREATE -- COLUMN "firstname" "lastname" "role"
            $_SESSION['profile_picture'] = $output['profile_picture'];
            $_SESSION['background_image'] = $output['background_image'];
            $_SESSION['fullname'] = $output['firstname'] . ' ' . $output['middlename'].' '.$output['lastname'].' '.$output['suffix'];
            $_SESSION['fulladdress'] = $output['province'] . ' ' . $output['city'].' '.$output['barangay'].' '.$output['street_name'].' '.$output['bldg_house_no'];
            $_SESSION['sex'] = $output['sex'];
            $_SESSION['email'] = $output['email'];
            $_SESSION['contact_number'] = $output['contact_number'];
            $_SESSION['logged-in'] = $output['username'];
            $_SESSION['role'] = $output['role'];
            $_SESSION['user_id'] = $output['id'];

            //display the appropriate dashboard page for user
                if($output['role'] == 'super_admin' || $output['role'] == 'event_admin' || $output['role'] == 'content_admin' || $output['role'] == 'feedback_admin' || $output['role'] == 'user_admin'){
                    header('location: ../admin/dashboard.php');
                }if ($output['role'] == 'user'){
                    header('location: ../home.php');
                }
            }
        //set the error message if account is invalid
        $error = 'Incorrect Account Credentials! Try again.';
    }
?>

    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo-details">
            <img src="../images/logos/phsi.png"  alt="PHSI-LOGO">
                <!--<i class='bx bx-meteor'></i>-->
                <span class="logo-name">WMSU-PHSI</span>
            </div>
            
            <label for="username" style="color: black;"></label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            
            <label for="password" style="color: black;"></label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            
            <?php   
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
            
            <input class="button" type="submit" value="Login" name="login" tabindex="3">
            <p style="text-align: center;  padding-top: 12px;">Don't have an account yet? <a href="signup.php"> Sign up</a></p>
            <div class="flex" style="justify-content: center; display: flex; padding-top: 8px;">
                <a href="#">Forgot password?</a>
            </div>
            
        </form>
    </div>


