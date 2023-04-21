<?php
require_once '../vendor/autoload.php';
require_once '../classes/user.class.php';


define('SENDER_EMAIL', 'arjaymalaga990@gmail.com');
define('SENDER_PASSWORD', 'mmdxwthytcedpsyz');


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername(SENDER_EMAIL, SENDER_EMAIL)
    ->setPassword(SENDER_PASSWORD, SENDER_PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
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
        <p>Thank you for signing up! We are thrilled to have you as a part of our community. In order to complete your registration and start enjoying the benefits of our website, please verify your account by clicking on the button below.</p>
        <p>This will enable you to access your account, join events, and manage your account. You will redirect to the login page after clicking the button.</p>
        <a href="http://localhost/wmsuphsi.online/verify_email.php?token=' . $token . '" style="color: #107869; background: white; border: 1px solid #107869; border-radius: 2px; ">Verify Email!</a>
       
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom([SENDER_EMAIL => 'Heylow'])
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
//<a href="https://wmsuphsi.online/verify_email.php?token=' . $token . '" style="color: #107869; background: white; border: 1px solid #107869; border-radius: 2px; ">Verify Email!</a></div>