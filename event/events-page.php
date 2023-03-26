   <?php

	//resume session here to fetch session values
   $page_title = 'Upcoming Events | WMSU - Peace and Human Security Institute';
   require_once '../includes/head.php';
   require_once '../includes/header.php';
   require_once '../classes/user.class.php';

   $user = new Users;
   $userData = $user -> fetch($_SESSION['user_id']);

   if(isset($_POST['submit'])) {
      //var_dump($_POST);

      // TABULATE DATA TO USER OBJECT
      $user -> user_id = $_SESSION['user_id'];
      $user -> event_id = $_POST['event_id'];
      $user -> firstname = $_POST['firstname'];
      $user -> middlename = $_POST['middlename'];
      $user -> lastname = $_POST['lastname'];
      $user -> suffix = $_POST['suffix'];
      $user -> email = $_POST['email'];
      $user -> contact_number= $_POST['contact'];
      $result = $user -> addUserToEvent();
   }
   // Check if user is logged in
   if (!isset($_SESSION['user_id'])) {
   // User is not logged in, redirect to login page
   header('Location: ../login/login.php');
   exit();
 }
?>


<?php
  require_once '../classes/event_model.php'; 
  $event = new Event();

  // Check if the article ID is set in the URL
  if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    $article = $event->fetchRecordById($article_id);

    if ($article) {
?>




<!-- Event Section Start  -->

<section class="event-heading">
   <div class="event-banner-container">
  <img src="../uploads/<?php echo $article['event_banner']; ?>" class="banner" alt="Background Image">
  <div class="event-wrapper">
    <div class="event-infos">
      <h2 class="event-title"></h2>
    </div>
  </div>
</div>
</section>


<section class="rsvp-container">
    <div class="rsvp-box">
        <p>RSVP for this event now!</p>
        
        <button class="btn" id="open-modal-btn">RSVP</button>

        <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 style="margin: auto; font-size: 3rem;">Attendee Information</h2>
            
            <form action="events-page.php" class="modal-form" id="modal-form" method="POST">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" required 
                value="<?php echo $userData['firstname'] ?>">

                <label for="middlename">Middle Name:</label>
                <input type="text" id="middlename" name="middlename" 
                value="<?php echo isset($userData['middlename']) ?  $userData['middlename']: "" ?>">

                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" required 
                value='<?php echo $userData['lastname'] ?>'>

                <label for="suffix">Suffix:</label>
                <input type="text" id="suffix" name="suffix" 
                value="<?php echo isset($userData['suffix']) ?  $userData['suffix']: "" ?>">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required 
                value="<?php echo $userData['email'] ?>">

                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" required 
                value="<?php echo $userData['contact_number'] ?> ">
                  
                <input type="hidden" name='event_id' value="1">

                <input type="submit" id="submit" name="submit" value="Submit">  
            </form>



        </div>
    </div>
    </div>
</section>


<script>
  const modal = document.getElementById("modal");
  const btn = document.getElementById("open-modal-btn");
  const closeBtn = modal.querySelector(".close");
  const form = document.getElementById("modal-form");
  const rsvpBox = document.querySelector(".rsvp-box");

  btn.onclick = function() {
    modal.style.display = "block";
  }

  closeBtn.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  form.addEventListener("submit", function(event) {
    event.preventDefault();
    modal.style.display = "none";
    rsvpBox.innerHTML = "<p>You're in! See you at the venue.</p>";
  });
</script>

<section class="about-event">
    <p class="about-heading">About this event</p>
    <p><?php echo $article['event_about'] ?></p>
</section>

<section class="event-information">
    <div class="event-info-container">
        <i class="bi bi-clock"><span>When</span></i>
        <p>Sept 28, 2022 11:00 AM - 5:00 PM</p>
        <i class="bi bi-geo-alt"><span>Where</span></i>
        <p><?php echo $article['event_location'] ?></p>
        <i class="bi bi-eye"><span>Scope</span></i>
        <p><?php echo $article['event_scope'] ?></p>
        <i class="bi bi-people"><span>Slots</span></i>
        <p><?php echo $article['event_slots'] ?></p>
        <i class="bi bi-laptop"><span>Platform</span></i>
        <p><?php echo $article['event_platform'] ?></p>
    </div>
    <div class="event-agenda-container">
        <i class="bi bi-pencil-square"><span>Agenda</span></i>
        <div class="agenda-info">
            <p class="agenda-time">9:00 AM</p>
            <p class="agenda-label">Opening Remarks</p>
            <p class="agenda-host">MR. FLORETO B. QUINITO JR. MSIT, Office of the Student Affairs Director</p> 
        </div>
        <div class="agenda-info">
            <p class="agenda-time">11:00 AM</p>
            <p class="agenda-label">Guest Speaker</p>
            <p class="agenda-host">MR. FLORETO B. QUINITO JR. MSIT, Office of the Student Affairs Director</p>
        </div>
        <div class="agenda-info">
            <p class="agenda-time">11:30 AM</p>
            <p class="agenda-label">Program</p>
            <p class="agenda-host">MR. FLORETO B. QUINITO JR. MSIT, Office of the Student Affairs Director</p>
        </div>
        <div class="agenda-info">
            <p class="agenda-time">12:00 PM</p>
            <p class="agenda-label">Closing Remarks</p>
            <p class="agenda-host">MR. FLORETO B. QUINITO JR. MSIT, Office of the Student Affairs Director</p>
        </div>
    </div>
</section>


<section class="event-organizers">

   <h1 class="heading">Speakers</h1>

   <div class="box-container container">


      <div class="box">
         <img src="../images/administration-profile/phsi-carla.png" alt="">
         <div class="admin-info">
         <h3>Engr. Marlon Grande</h3>
         <p>Club Adviser</p>
         </div>
      </div>

      <div class="box">
         <img src="../images/administration-profile/phsi-marlon.png" alt="">
         <h3>Clarise Jane Tayao</h3>
         <p>President</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/phsi-ludi.png" alt="">
         <h3>Araffi Suhaide</h3>
         <p>Vice President</p>
      </div>
   </div>
</section>

<section class="event-organizers">

   <h1 class="heading">Organizers</h1>

   <div class="box-container container">


      <div class="box">
         <img src="../images/administration-profile/phsi-marlon.png" alt="">
         <div class="admin-info">
         <h3>Engr. Marlon Grande</h3>
         <p>Club Adviser</p>
         </div>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-clarise.png" alt="">
         <h3>Clarise Jane Tayao</h3>
         <p>President</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-arafi.png" alt="">
         <h3>Araffi Suhaide</h3>
         <p>Vice President</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-krisha.png" alt="">
         <h3>Krisha Joy Elumir</h3>
         <p>General Secretary</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-ahmad.png" alt="">
         <h3>Ahmad Alawi</h3>
         <p>PIO</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-juniel.png" alt="">
         <h3>Juniel Anoso</h3>
         <p>External Finance</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-amir.png" alt="">
         <h3>Amir Nashireen Tadjul</h3>
         <p>Internal Finance</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-lowel.png" alt="">
         <h3>Lowel Jay Recto</h3>
         <p>Auditor</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-kin.png" alt="">
         <h3>Kin Gerald Lugas</h3>
         <p>Project Manager</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-almuha.png" alt="">
         <h3>Almuhaimin Jahama</h3>
         <p>Ambassador</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-elvina.png" alt="">
         <h3>Elvina Vanessa Kairan</h3>
         <p>Ambassadress</p>
      </div>

      <div class="box">
         <img src="../images/student-profile/user-icon.png"" alt="">
         <h3>Vanessa Pascua</h3>
         <p>Content Committee</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-kristine.png" alt="">
         <h3>Kristine Joy Esteban</h3>
         <p>Creative Committee Head</p>
      </div>

      <div class="box">
         <img src="../images/student-profile/user-icon.png" alt="">
         <h3>Myrtle Pama</h3>
         <p>Creative Committee Asst. Head</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-clark.png" alt="">
         <h3>Clark Santander</h3>
         <p>Creative Committee</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-jenevie.png" alt="">
         <h3>Jenevie Balendres</h3>
         <p>Creative Committee</p>
      </div>

      <div class="box">
         <img src="../images/administration-profile/unesco-gloria.png" alt="">
         <h3>Gloria Louie Escote</h3>
         <p>Membership Committee</p>
      </div>

      <div class="box">
         <img src="../images/student-profile/user-icon.png" alt="">
         <h3>Monique Dancel</h3>
         <p>Membership Committee</p>
      </div>
   </div>
</section>

<?php
    } else {
      // Display error message if article is not found
      echo 'Article not found.';
    }
  } else {
    // Display error message if article ID is not set in URL
    echo 'Invalid article ID.';
  }
?>

<script src="../js/modal.js"></script>



<!-- Event Section End -->


<?php
    require_once '../includes/footer.php';
?>