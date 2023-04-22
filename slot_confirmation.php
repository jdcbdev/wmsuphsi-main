<?php

session_start();
require_once 'classes/rsvp_model.php';


if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $rsvp = new Rsvp();
    if($rsvp -> confirm_slot($token)) {
        if($rsvp -> update_token($token)){
            $_SESSION['id'] = $rsvp->id;
            $_SESSION['username'] = $rsvp->username;
            $_SESSION['email'] = $rsvp->email;
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            header('location: user/eventtimeline.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}

?>
