<?php
require_once '../vendor/autoload.php';
require_once '../classes/rsvp_model.php';
require_once '../classes/user.class.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

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

function sendEventTicket($userEmail, $token, $firstname, $middlename, $lastname, $suffix, $event_title, $event_banner, $event_location, $event_start_date, $event_start_time) 
{
    global $mailer;

    // Generate QR code
    $text = $firstname.' '.$middlename.' '.$lastname.' '.$suffix;
    $qr_code = QrCode::create($text)
                     ->setSize(600)
                     ->setMargin(40);
    $writer = new PngWriter;
    $qr_code_image = $writer->write($qr_code)->getString();

    // Create email body
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
        <p>We are pleased to inform you that your slot for the event has been reserved successfully, and we are thrilled to have you as a participant in this event. </p>
        <p>Thank you for confirming your attendance for the event. We look forward to seeing you there.</p>
        <p>If you have any queries, please do not hesitate to contact us. We are always available to assist you.</p>
        <p>Kindly bring the ticket attached below to the event as proof of confirmation of your attendance. </p>
        <p>Thank you for your participation, and we are looking forward to seeing you at the event.</p>
      </div>
    </body>
    </html>';

    // Create a message
    $message = (new Swift_Message('[TICKET CONFIRMATION] You are now registered for ' . $event_title))
        ->setFrom([SENDER_EMAIL => 'WMSU - Peace and Human Security Institute'])
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Attach the QR code image to the email message
    $attachment = new Swift_Attachment($qr_code_image, 'qr-code.png', 'image/png');
    $message->attach($attachment);

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}