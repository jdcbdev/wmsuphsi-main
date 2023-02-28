<?php
    
    //this is where the page starts

    //start session
    session_start();

    //check if user is login already otherwise send to login page
    if (isset($_SESSION['role']) == 'super_admin' || ($_SESSION['role']) == 'event_admin' || ($_SESSION['role']) == 'content_admin' || ($_SESSION['role']) == 'user_admin' || ($_SESSION['role']) == 'feedback_admin' ){
        header('location: admin/dashboard.php');
    }
    else if (isset($_SESSION['role']) == 'user'){
        header('location: user/user-profile.php');
    }
    else{
        header('location: home.php');
    }

?>