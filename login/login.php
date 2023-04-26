<!-- This is the code for Login Page -->
<?php
     require_once '../classes/user.class.php';
     require_once '../tools/functions.php';
    //resume session here to fetch session values
    session_start();

    if(isset($_SESSION['logged-in'])) {
        header("location: ../home.php");
        exit();
    }

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
        
        // Verify the reCAPTCHA response
        $recaptcha_secret = '6Ley7zslAAAAAAzfUOiWUDuKPlagO_F2ODAAUcaY';
        $recaptcha_response = $_POST['g-recaptcha-response'];

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
        $response_data = json_decode($response);
        
        if (!$response_data->success) {
            // The reCAPTCHA verification failed
            // Handle the error accordingly
        } else {
            // The reCAPTCHA verification succeeded
            // Process the form submission
            // ...
        } 

        if ($output) {
            $_SESSION['verify_one'] = $output['verify_one'];
            $_SESSION['verify_two'] = $output['verify_two'];
            $_SESSION['verify_three'] = $output['verify_three'];
            $_SESSION['verify_four'] = $output['verify_four'];
            $_SESSION['verify_five'] = $output['verify_five'];
            $_SESSION['verify_six'] = $output['verify_six'];
            $_SESSION['verify_seven'] = $output['verify_seven'];
            $_SESSION['verify_eight'] = $output['verify_eight'];
            $_SESSION['profile_picture'] = $output['profile_picture'];
            $_SESSION['background_image'] = $output['background_image'];
            $_SESSION['organization'] = $output['organization'];
            $_SESSION['member_type'] = $output['member_type'];
            $_SESSION['is_agree'] = $output['is_agree'];
            $_SESSION['status'] = $output['status'];
            $_SESSION['fullname'] = $output['firstname'] . ' ' . $output['middlename'].' '.$output['lastname'].' '.$output['suffix'];
            $_SESSION['fulladdress'] = $output['province'] . ' ' . $output['city'].' '.$output['barangay'].' '.$output['street_name'].' '.$output['bldg_house_no'];
            $_SESSION['sex'] = $output['sex'];
            $_SESSION['email'] = $output['email'];
            $_SESSION['contact_number'] = $output['contact_number'];
            $_SESSION['logged-in'] = $output['username']. ' ' . $output['password'];
            $_SESSION['role'] = $output['role'];
            $_SESSION['token'] = $output['token'];
            $_SESSION['verified'] = $output['verified'];
            $_SESSION['province'] = $output['province'];
            $_SESSION['city'] = $output['city'];
            $_SESSION['barangay'] = $output['barangay'];
            $_SESSION['firstname'] = $output['firstname'];
            $_SESSION['middlename'] = $output['middlename'];
            $_SESSION['lastname'] = $output['lastname'];
            $_SESSION['street_name'] = $output['street_name'];
            $_SESSION['bldg_house_no'] = $output['bldg_house_no'];
            $_SESSION['suffix'] = $output['suffix'];
            $_SESSION['username'] = $output['username'];
            $_SESSION['password'] = $output['password'];           
            $_SESSION['user_id'] = $output['id'];

            //display the appropriate dashboard page for the following role:
                /*
                If the role is equal to these:
                    1. Super Admin - This admin can access both UNESCO & PHSI features and or functionalities (whole system). This admin can assign role to users.
                    2. PHSI Admin - This admin can access only their organization features. This admin can ssign role to their users who is a member of PHSI.
                    3. PHSI Content Admin - This admin can only access the dashboard but is limited to content management system of their organization. This admin can't assign role.  
                    4. UNESCO Admin - This admin can access only their organization features. This admin can ssign role to their users who is a member of UNESCO.
                    3. UNESCO Content Admin - This admin can only access the dashboard but is limited to content management system of their organization. This admin can't assign role.  
                */
                if($output['role'] == 'super_admin' || $output['role'] == 'unesco_admin' || $output['role'] == 'phsi_admin' && $output['verified'] == 1){
                    header('location: ../admin/admin.php');
                /*
                    If the role is equal to 'user' - the system will redirect this 'user' to the home page of the system (not in the dashboard).
                */
                }if ($output['role'] == 'user' && $output['verified'] == 1){
                    header('location: ../home.php');
                }
            }
        //if account credential is not in the database, this error message will be display.
        $error = 'Incorrect Account Credentials! Try again.';
    }
?>

    <div class="login-container">
        <form class="login-form" action="login.php" method="post" onsubmit="return checkRecaptcha()">
            <div class="logo-details">
            <img src="../images/logos/phsi.png"  alt="PHSI-LOGO">
                <!--<i class='bx bx-meteor'></i>-->
                <span class="logo-name">WMSU-PHSI</span>
            </div>
            

            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1" style="margin-top: 10px;margin-bottom: 15px;">
            
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">

            <div class="g-recaptcha" data-sitekey="6Ley7zslAAAAAEJKMa5RypSUqOkVHkS2cq5isadS" style="padding-top: 2rem; display: flex;justify-content: center;" required></div>

            <div class="flex" style="display: flex; padding: 10px 10px 10px 1px;">
                <a href="#">Forgot password?</a>
            </div>
            <?php   
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
            
            <input class="button" type="submit" value="Login" name="login" tabindex="3" style="margin: 0;">
            <p style="text-align: center;  padding-top: 12px;">Don't have an account yet? <a href=" signup.php"> Sign up</a></p>
            
        </form>
    </div>

    <script>
    function checkRecaptcha() {
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            var modal = document.createElement("div");
            modal.style.position = "fixed";
            modal.style.top = "0";
            modal.style.left = "0";
            modal.style.width = "100%";
            modal.style.height = "100%";
            modal.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
            modal.style.display = "flex";
            modal.style.justifyContent = "center";
            modal.style.alignItems = "center";
            
            var message = document.createElement("p");
            message.style.backgroundColor = "white";
            message.style.padding = "20px";
            message.style.borderRadius = "10px";
            message.textContent = "Please click the reCAPTCHA checkbox to prove you are not a robot.";
            
            modal.appendChild(message);
            document.body.appendChild(modal);

            // Close the modal when the user clicks anywhere outside it
            modal.addEventListener("click", function(event) {
                if (event.target === modal) {
                    document.body.removeChild(modal);
                }
            });
            
            return false;
        } else {
            return true;
        }
    }
</script>

