<?php

session_start();
require_once '../classes/database.php';
require_once '../vendor/autoload.php';
require_once '../classes/rsvp_model.php';
require_once '../controllers/sendEventTicket.php';


if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $rsvp = new Rsvp();
    if($rsvp->confirmSlot($token)) {
        if($rsvp->updateToken($token)){
            $rsvp->sendConfirmationEmail($token, $event_title, $event_banner, $event_location, $event_start_date, $event_start_time);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}

?>
