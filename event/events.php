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
   ?> 


<div class="events-container">

	
	<div class="event">

		<div class="event-image-container">
            <img src="../uploads/<?php echo $value['event_banner']; ?>" alt="">
		</div>

		<div class="event-info">
			<h6>Sept 28, 2022 - EVENT  - <span>WMSU Youth Peace Mediators - UNESCO Club</span></h6>
			<h2><?php echo $value['event_title'] ?></h2>
            <div class="event-content">
                <p><?php echo $value['event_about'] ?></p>
            </div>
			<a href="events-page.php?id=<?php echo $value['id']; ?>" class="btn">View details</a>
		</div>

	</div>

</div>

<?php
      }
   ?>






<?php
    require_once '../includes/footer.php';
?>