<?php

require "../vendor/autoload.php";

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$text = $_POST["text"];

$qr_code = QrCode::create($text)
                 ->setSize(600)
                 ->setMargin(40);
$writer = new PngWriter;

$result = $writer->write($qr_code);

// Save the image to a file
$result->saveToFile("qr-code.png");

// Assign the HTML code to a variable
$ticket_design = '
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="style.css">

<div class="ticket">
  <div class="left">
    <div class="image">
      <p class="admit-one">
        <span>ADMIT ONE</span>
        <span>ADMIT ONE</span>
        <span>ADMIT ONE</span>
      </p>
      <div class="ticket-number">
        <p>' . $text . '</p>
      </div>
    </div>
    <div class="ticket-info">
      <p class="date">
        <span>EVENT</span>
        <span class="nov-10">MAY 31, 2023</span>
        <span>DATE</span>
      </p>
      <div class="show-name">
        <h1>Event Title</h1>
        <h2>Event Location</h2>
      </div>
      <div class="time">
        <p>12:30 PM <span>TO</span> 12:30 AM</p>
      </div>
      <div class="tagline">
        <p>IN THIS LIFE OR THE NEXT</p>
      </div>
      <p class="location"><span>WMSU Peace and Human Security Institute</span></p>
    </div>
  </div>
  <div class="right">
    <p class="admit-one">
      <span>ADMIT ONE</span>
      <span>ADMIT ONE</span>
      <span>ADMIT ONE</span>
    </p>
    <div class="right-info-container">
        <div class="show-name">
          <h1>#PromotePeace</h1>
        </div>
        <div class="time">
          <p>13.04.2023</p>
          <p>12:49 PM <span>TO</span> TBD</p>
        </div>
        <div class="barcode">
          <img src="qr-code.png" alt="QR code">
        </div>
        <p class="ticket-number">
          #20231304
        </p>
      </div>
  </div>
</div>
';

// Output the ticket design HTML code to the browser
echo $ticket_design;

?>
