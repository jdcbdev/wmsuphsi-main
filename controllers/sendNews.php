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

function sendNews($emails, $news_title)
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
        <p>We are excited to announce that we have added a new article to our news section. Stay up-to-date with the latest activities of WMSU - Peace and Human Security Institute by reading our latest news.</p>
        <a href="https://wmsuphsi.online/news/news.php" style="color: #107869; background: white; border: 1px solid #107869; border-radius: 2px; ">View News</a>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('READ THIS: ['.$news_title.']'))
        ->setFrom([SENDER_EMAIL => 'WMSU - Peace and Human Security Institute'])
        ->setTo($emails)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}
