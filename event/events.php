<?php
$page_title = 'Upcoming Events | WMSU - Peace and Human Security Institute';
require_once '../includes/head.php';
require_once '../includes/header.php';
?>

<section class="heading-link">
   <h3>Upcoming Events</h3>
   <p> <a href="../home.php">Home</a> / Upcoming Events</p>
</section>

<?php
require_once '../classes/event_model.php';
$event = new Event();
// Fetch all the records in the array using loop
foreach ($event->fetchAllRecords() as $value) {
    // Display each event in a box
    $event_end_datetime = $value['event_end_date'] . ' ' . $value['event_end_time'];
    if (strtotime($event_end_datetime) >= time()) { // check if the event has not ended yet
?>

<div class="events-container">
    <div class="event">
        <div class="event-image-container">
            <img src="../uploads/<?php echo $value['event_banner']; ?>" alt="">
        </div>
        <div class="event-info">
            <h6><?php echo $value['event_start_date'] ?> <!--<span><?php echo $value['event_organizer'] ?></span>--><?php echo ' | '.''. $value['event_location'] ?></h6>
            <h2><?php echo $value['event_title'] ?></h2>
            <div class="event-content">
                <p><?php echo $value['event_about'] ?></p>
            </div>
            <?php if (isset($_SESSION['logged-in'])) { ?>
            <a href="events-page.php?id=<?php echo $value['id']; ?>" class="btn">View Details</a>
            <?php } else { ?>
            <a href="nonUserReg.php?id=<?php echo $value['id']; ?>" class="btn">View Details</a>
            <?php } ?>
        </div>
    </div>
</div>

<?php 
    }
}
require_once '../includes/footer.php'; 
?>
