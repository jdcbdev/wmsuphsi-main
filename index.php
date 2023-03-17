<?php
    
    //this is where the page starts

    //start session
    session_start();

    //check if user is login already otherwise send to home page yet not login)
    if (isset($_SESSION['role']) == 'super_admin' || ($_SESSION['role']) == 'unesco_admin' || ($_SESSION['role']) == 'phsi_admin' || ($_SESSION['role']) == 'phsi_content_admin' || ($_SESSION['role']) == 'unesco_content_admin'){
        header('location: admin/dashboard.php');
    }
    else if (isset($_SESSION['role']) == 'user'){
        header('location: user/user-profile.php');
    }
    else{
        header('location: home.php');
    }

?>