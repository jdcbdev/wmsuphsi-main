<?php
     require_once '../classes/user.class.php';
    //resume session here to fetch session values
    session_start();
    $page_title = 'Login | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>


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
            "role" => 'normal_user',
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
    if(isset($_POST['user_name']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
       
        $user= new users;
        $user -> email = htmlentities($_POST['user_name']); 
        $user -> password = htmlentities($_POST['password']); 

        $output= $user -> login();

        if ($output) {
            // CREATE -- COLUMN "firstname" "lastname" "role"
            $_SESSION['logged-in'] = $output['username'];
            $_SESSION['fullname'] = $output['firstname'] . ' ' . $output['lastname'];
            $_SESSION['user_role'] = $output['role'];

            //display the appropriate dashboard page for user
                if($output['role'] == 'Admin'){
                    // print_r($_SESSION);
                    header('location: ../admin/dashboard.php');
                }else{
                    // header('location: ../user/user-profile.php');
                    //  header('location: ../admin/dashboard1.php');
                }
            }
        // $username = htmlentities($_POST['username']);
        // $password = htmlentities($_POST['password']);
        // foreach($accounts as $keys => $value){
        //     //check if the username and password match in the array
        //     if($username == $value['username'] && $password == $value['password']){
        //         //if match then save username, fullname and type as session to be reused somewhere else
        //         $_SESSION['logged-in'] = $value['username'];
        //         $_SESSION['fullname'] = $value['firstname'] . ' ' . $value['lastname'];
        //         $_SESSION['user_role'] = $value['role'];
        //         //display the appropriate dashboard page for user
        //         if($value['role'] == 'admin'){
        //             header('location: ../admin/dashboard.php');
        //         }else{
        //             header('location: ../user/user-profile.php');
        //         }
        //     }
        
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
            
            <label for="user_name" style="color: black;"></label>
            <input type="text" id="user_name" name="user_name" placeholder="Enter username" required tabindex="1">
            
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


