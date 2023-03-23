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

        if ($output) {
            $_SESSION['verify_one'] = $output['verify_one'];
            $_SESSION['verify_two'] = $output['verify_two'];
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
                if($output['role'] == 'super_admin' || $output['role'] == 'unesco_admin' || $output['role'] == 'unesco_content_admin' || $output['role'] == 'phsi_admin' || $output['role'] == 'phsi_content_admin'){
                    header('location: ../admin/admin.php');
                /*
                    If the role is equal to 'user' - the system will redirect this 'user' to the home page of the system (not in the dashboard).
                */
                }if ($output['role'] == 'user'){
                    header('location: ../home.php');
                }
            }
        //if account credential is not in the database, this error message will be display.
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
            
            <label for="password" style="color: black;" ></label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
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
            <p style="text-align: center;  padding-top: 12px;">Don't have an account yet? <a href="category.signup.php"> Sign up</a></p>
            
        </form>
    </div>

