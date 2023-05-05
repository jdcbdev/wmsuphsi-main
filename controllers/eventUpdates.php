<?php
require_once '../vendor/autoload.php';
require_once '../classes/user.class.php';
require_once '../classes/rsvp_model.php';

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

function sendEventUpdates($userEmail, $event_title, $event_about, $event_reg_duedate, $event_start_date)
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
        <p>Hello! We wanted to let you know that there has been an update to '.$event_title.'.</p>
        <p>Please click the button below to view the new detials of this Event
        . Thank you!</p>
        <a href="https://wmsuphsi.online/event/events.php" style="color: #107869; background: white; border: 1px solid #107869; border-radius: 2px; ">View Event Changes</a>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('[EVENT UPDATE: '. $event_title.']'))
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
