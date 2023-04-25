<?php
    
    //this is where the page starts

    //start session
    session_start();

    //check if user is login already otherwise send to home page yet not login)
    if (isset($_SESSION['role']) == 'super_admin' || ($_SESSION['role']) == 'unesco_admin' || ($_SESSION['role']) == 'phsi_admin' || ($_SESSION['role']) && $_SESSION['verified'] == 1){
        header('location: admin/admin.php');
    }
    else if (isset($_SESSION['role']) == 'user' && $_SESSION['verified'] == 1){
        header('location: user/user-profile.php');
    }
    else{
        header('location: home.php');
    }

?>