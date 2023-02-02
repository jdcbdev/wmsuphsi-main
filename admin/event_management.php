<?php

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../home.php');
    }
    //if the above code is false then html below will be displayed
    $event_management = 'active';
    require_once '../includes/admin-header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>




<?php
    require_once '../includes/admin-footer.php';
?>