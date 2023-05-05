<?php
require_once '../vendor/autoload.php';
require_once '../classes/user.class.php';

define('SENDER_EMAIL', 'wmsuphsi@wmsuphsi.online');
define('SENDER_PASSWORD', '@wmsuPHS1');

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.hostinger.com', 465, 'ssl'))
    ->setUsername(SENDER_EMAIL, SENDER_EMAIL)
    ->setPassword(SENDER_PASSWORD, SENDER_PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendEventInvitation($userEmail, $event_title, $event_banner, $event_about, $event_reg_duedate, $event_start_date)
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
        <p>Join us for an exciting event on '.$event_start_date.'! We are thrilled to invite you to '.$event_title.'.</p>
        <p>'.$event_about.'</p>
        <p>But hurry! Registration ends on '.$event_reg_duedate.', so be sure to register ASAP by clicking the button below! Do not miss out on this incredible opportunity, we can not wait to see you there."</p>
        <a href="http://localhost/wmsuphsi-main/event/events.php" style="color: #107869; background: white; border: 1px solid #107869; border-radius: 2px; ">Register!</a>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Join '. $event_title.' Now!'))
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
