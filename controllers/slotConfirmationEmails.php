<?php
require_once '../vendor/autoload.php';
require_once '../classes/rsvp_model.php';
require_once '../classes/user.class.php';

if (!defined('SENDER_EMAIL')) {
    define('SENDER_EMAIL', 'wmsuphsi@wmsuphsi.online');
}

if (!defined('SENDER_PASSWORD')) {
    define('SENDER_PASSWORD', '@wmsuPHS1');
}

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.hostinger.com', 465, 'ssl'))
    ->setUsername(SENDER_EMAIL)
    ->setPassword(SENDER_PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendSlotConfirmation($userEmail, $token, $firstname, $event_title, $event_banner) 
{

    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <img src="https://wmsuphsi.online/uploads/'.$event_banner.'" alt="'.$event_title.'" style="width: 75%;">
        <p>Dear '. $firstname .',</p>
        <p>We are pleased to confirm that your slot for the event has been reserved successfully. 
        We are thrilled to have you as a participant in this event, and we are looking forward to your presence.
        To ensure your slot is secured, we kindly ask you to confirm your attendance by clicking on
        the button below within the next [time frame] to avoid cancellation of your slot.</p>
        
        <p>This will help us to make sure that we have the right number of participants for the event.
        Please note that if we do not hear back from you within the given time frame, 
        your slot may be given to someone else on the waiting list.
        If you have any questions or concerns about the event, please do not hesitate to contact us. We are always happy to help.</p>
        
        <a href="https://wmsuphsi.online/controllers/slot_confirmation.php?token=' . $token . '" style="color: #107869; background: white; border: 1px solid #107869; border-radius: 2px; ">CONFIRM MY SLOT</a>

        <p>Thank you for your participation, and we look forward to seeing you soon.</p>

        <p>Best regards,</p>

        <p>WMSU - Peace and Human Security Institute</p>
        
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Confirming Your Slot in ' . $event_title))
        ->setFrom([SENDER_EMAIL => 'WMSU - Peace and Human Security Institute'])
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

