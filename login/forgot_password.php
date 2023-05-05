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

    $page_title = 'Forgot Password | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>



    <div class="login-container">   
        <form class="login-form" action="login.php" method="post" onsubmit="return checkRecaptcha()">
            <div class="logo-details">
            <img src="../images/logos/phsi.png"  alt="PHSI-LOGO">
                <!--<i class='bx bx-meteor'></i>-->
                <span class="logo-name">WMSU-PHSI</span>
            </div>
            
            <p style="justify-content: center;display: flex;font-size: 14px;margin-top: 12px;">Forgot Your Password? Enter your Email to receive</p>
            <input type="email" id="email" name="email" placeholder="Enter Email" required tabindex="1" style="margin-top: 10px;margin-bottom: 15px;">
            
            <?php   
                //Display the error message if there is any.
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
            
            <input class="button" type="submit" value="Reset Password" name="login" tabindex="3" style="margin: 0;">
            <!--<p style="text-align: center;  padding-top: 12px;">ALREADY HAVE AN ACCOUNT?<a href="login.php"> SIGN IN</a></p>-->
            
        </form>
    </div>

