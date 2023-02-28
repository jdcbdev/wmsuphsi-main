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
      <p class="profile-description">WMSU Student / WMSU UNESCO Club</p>
      <a href="edit-profile.php" class="edit-profile-btn">Edit Profile</a>
    </div>
  </div>
</div>

<section>
  <div class="user-work">
    <div class="top-right">
      <a href=""><span>Profile</span></a>
      <a href="eventtimeline.php"><span>Event Timeline</span></a>
    </div>
    <p>About me</p>
  </div>
</section>












<?php
    require_once '../includes/footer.php';

?>
