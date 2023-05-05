<?php
session_start();
    require_once 'classes/user.class.php';

    //THE RECEIVER OF THE EVENT UPDATES SHOULD BE THE USER WHO IS ALREADY REGISTER (ALREADY HAVE THE TICKET)

    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $user = new Users();
        if($user -> getEmailsForEvent($eventId, $token)) {
            $_SESSION['id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['email'] = $user->email;
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            header('location: event/events-page.php');
            exit(0);
        } else {
            echo "User not found!";
        }
    } else {
        echo "No token provided!";
    }
?>