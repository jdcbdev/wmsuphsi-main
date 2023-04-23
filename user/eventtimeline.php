<?php
    $page_title = 'Profile   | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    

?>
<link rel="stylesheet" href="../css/user.css">

<div class="profile-container">
  <img src="../uploads/<?php echo $_SESSION['background_image']; ?>" class="background-image" alt="Background Image">
  <div class="profile-wrapper">
    <img src="../uploads/<?php echo $_SESSION['profile_picture']; ?>" class="profile-image" alt="Profile Image">
    <div class="profile-info">
      <h2 class="profile-name"><?php echo $_SESSION['fullname']; ?></h2>
      <a href="edit-profile.php" class="edit-profile-btn">Edit Profile</a>
    </div>
  </div>
</div>

<section>
  <div class="user-work">
    <div class="top-right">
      <a href="user-profile.php"><span>Profile</span></a>
      <a href="eventtimeline.php"><span>Event Timeline</span></a>
    </div>
    <p>Upcoming Events</p>
  </div>

  <div class="events-container">
	<div class="event">
		<div class="event-image-container">
            <img src="../images/content-images/unesco-peacte.jpg" alt="">
		</div>
		<div class="event-info">
			<h6>Oct 22, 2022 - CALL FOR VOLUNTEERS  - <span>WMSU Youth Peace Mediators - UNESCO Club</span></h6>
			<h2>PEACE-ta sa UNESCO: Pagkakaisa tungo sa Matibay na Samahan</h2>
            <div class="event-content">
                <p>This year's GENERAL ASSEMBLY aims to strengthen the members' relationship and build a strong camaraderie through team-building activities with the theme PEACE-ta sa UNESCO: Pagkakaisa tungo sa Matibay na Samahan.</p>
            </div>
			<a href="events-page.php" class="btn">View details</a>
		</div>
	</div>     
</div>
  

</section>

<section>
  <div class="user-work">
    <p>Past Events</p>
  </div>

  <div class="events-container">
	<div class="event">
		<div class="event-image-container">
            <img src="../images/content-images/unesco-peacte.jpg" alt="">
		</div>
		<div class="event-info">
			<h6>Oct 22, 2022 - CALL FOR VOLUNTEERS  - <span>WMSU Youth Peace Mediators - UNESCO Club</span></h6>
			<h2>PEACE-ta sa UNESCO: Pagkakaisa tungo sa Matibay na Samahan</h2>
            <div class="event-content">
                <p>This year's GENERAL ASSEMBLY aims to strengthen the members' relationship and build a strong camaraderie through team-building activities with the theme PEACE-ta sa UNESCO: Pagkakaisa tungo sa Matibay na Samahan.</p>
            </div>
			<a href="events-page.php" class="btn">View details</a>
		</div>
	</div>     
</div>
  

</section>















<?php
    require_once '../includes/footer.php';

?>