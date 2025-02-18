   <?php
	//resume session here to fetch session values
   $page_title = 'Upcoming Events | WMSU - Peace and Human Security Institute';
   require_once '../includes/head.php';
   require_once '../includes/header.php';
   require_once '../classes/user.class.php';
?>

<?php
require_once '../classes/event_model.php'; 
$event = new Event();

// Check if the article ID is set in the URL
if (isset($_GET['id'])) {
  $article_id = $_GET['id'];
  $article = $event->fetchRecordById($article_id);
  $event_id = $article['id']; // get the event ID from the article
  $total_attendees = $event->countAttendees($event_id); // call the countAttendees function
  $available_slots = $article['event_slots'] - $total_attendees;

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

<?php

require_once '../classes/rsvp_model.php';
require_once '../controllers/slotConfirmationEmails.php';

$user = new Users;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$userData = $user -> fetch($_SESSION['user_id']);
if(isset($_POST['submit'])) {
   
   // Verify the reCAPTCHA response
   $recaptcha_secret = '6Ley7zslAAAAAAzfUOiWUDuKPlagO_F2ODAAUcaY';
   $recaptcha_response = $_POST['g-recaptcha-response'];

   $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
   $response_data = json_decode($response);

   if (!$response_data->success) {
     // The reCAPTCHA verification failed
     // Handle the error accordingly
   } else {
      // The reCAPTCHA verification succeeded
      // Process the form submission
      // ...
   } 
      // TABULATE DATA TO USER OBJECT
      $user->id = $id;
      $user->event_id = htmlentities($_POST['event_id']);
      $user->firstname = htmlentities($_POST['firstname']);
      $user->middlename = htmlentities($_POST['middlename']);
      $user->lastname = htmlentities($_POST['lastname']);
      $user->suffix = htmlentities($_POST['suffix']);
      $user->email = htmlentities($_POST['email']);
      $user->contact_number = htmlentities($_POST['contact_number']);
      $user->province = htmlentities($_POST['province']);
      $user->city = htmlentities($_POST['city']);
      $user->barangay = htmlentities($_POST['barangay']);
      $user->street_name = htmlentities($_POST['street_name']);
      $user->bldg_house_no = htmlentities($_POST['bldg_house_no']);
      $user->member_type = htmlentities($_POST['member_type']);
      $user-> token = bin2hex(random_bytes(50)); // generate unique token
      $token = $user->token;
      $email = $user->email;
      $firstname = $user->firstname;
      $event_title = $article['event_title'];
      $event_banner = $article['event_banner'];
   if ($user->addUserToEvent($token)) {
      // TO DO: send slot confirmation mail to user
      sendSlotConfirmation($email, $token, $firstname, $event_title, $event_banner);
      //redirect user to verifying page after saving
      header('location: registered-event.php');
      exit;
   } 
} else {
   if ($id && $user->fetch($id)){
      $data = $user->fetch($id);

      $_POST['firstname'] = $data['firstname'];
      $_POST['middlename'] = $data['middlename'];
      $_POST['lastname'] = $data['lastname'];
      $_POST['suffix'] = $data['suffix'];
      $_POST['email'] = $data['email'];
      $_POST['contact_number'] = $data['contact_number'];
      $_POST['province'] = $data['province'];
      $_POST['city'] = $data['city'];
      $_POST['barangay'] = $data['barangay'];
      $_POST['street_name'] = $data['street_name'];
      $_POST['bldg_house_no'] = $data['bldg_house_no'];
      $_POST['member_type'] = $data['member_type'];
      $_POST['token'] = $data['token'];
      
   }
}
?>

<section class="rsvp-container">
    <div class="rsvp-box">
        <p style="text-align: center;font-size: 18px;font-weight: bold;"><?php echo $article['event_title'] ?></p>
      
        <button class="btn" id="open-modal-btn">RSVP TO JOIN THIS EVENT</button>

        <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 style="margin: auto; font-size: 3rem;">You're almost there!</h2>
            <p style="font-size: 12px; justify-content: center; display: flex; margin: auto; width: 50;padding: 2rem; text-align: center;">To help us fight spam, please complete this verification step. </p>

            <form action="events-page.php?id=<?php echo $id; ?>" class="modal-form" id="modal-form" method="post">
               
               <label for="firstname" style="display: none;">First Name:</label>
                <input type="hidden" id="firstname" name="firstname" required 
                value="<?php echo $userData['firstname'] ?>">

                <label for="middlename" style="display: none;">Middle Name:</label>
                <input type="hidden" id="middlename" name="middlename" 
                value="<?php echo isset($userData['middlename']) ?  $userData['middlename']: "" ?>">

                <label for="lastname" style="display: none;">Last Name:</label>
                <input type="hidden" id="lastname" name="lastname" required 
                value='<?php echo $userData['lastname'] ?>'>

                <label for="suffix" style="display: none;">Suffix:</label>
                <input type="hidden" id="suffix" name="suffix" 
                value="<?php echo isset($userData['suffix']) ?  $userData['suffix']: "" ?>">

                <label for="email" style="display: none;">Email:</label>
                <input type="hidden" id="email" name="email" required 
                value="<?php echo $userData['email'] ?>">

                <label for="contact_number" style="display: none;">Contact:</label>
                <input type="hidden" id="contact_number" name="contact_number" required 
                value="<?php echo $userData['contact_number'] ?> ">

                <label for="province" style="display: none;">Province:</label>
                <input type="hidden" id="province" name="province" required 
                value="<?php echo $userData['province'] ?> ">

                <label for="city" style="display: none;">City:</label>
                <input type="hidden" id="city" name="city" required 
                value="<?php echo $userData['city'] ?> ">

                <label for="barangay" style="display: none;">Barangay:</label>
                <input type="hidden" id="barangay" name="barangay" required 
                value="<?php echo $userData['barangay'] ?> ">

                <label for="street_name" style="display: none;">Street Name:</label>
                <input type="hidden" id="street_name" name="street_name" required 
                value="<?php echo $userData['street_name'] ?> ">

                <label for="bldg_house_no" style="display: none;">Bldg/House No.:</label>
                <input type="hidden" id="bldg_house_no" name="bldg_house_no" required 
                value="<?php echo $userData['bldg_house_no'] ?> ">

                <label for="member_type" style="display: none;">Member Types:</label>
                <input type="hidden" id="member_type" name="member_type" required 
                value="<?php echo $userData['member_type'] ?> ">

                <input type="hidden" name='event_id' value="<?php echo $id; ?>">
                
                <div class="g-recaptcha" data-sitekey="6Ley7zslAAAAAEJKMa5RypSUqOkVHkS2cq5isadS" style="justify-content: center;display: flex;" required></div>

                <input type="submit" id="submit" name="submit" value="Submit">  
            </form>

            <div id="overlay">
               <div id="loading-icon">
                  <img src="../images/content-images/loading.gif" alt="loading">
                  <span style="color: white;">Loading...</span>
               </div>
            </div>
            <style>
               #overlay {
                  position: fixed;
                  top: 0;
                  left: 0;
                  bottom: 0;
                  right: 0;
                  background-color: rgba(0, 0, 0, 0.5);
                  display: none;
                  }

                  #overlay.show {
                  display: block;
                  }

                  /* Your existing CSS for the loading icon */

                  #loading-icon {
                  position: fixed;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  z-index: 9999;
                  background-color: rgba(5, 5, 5, 0.5);
                  padding: 100%;
                  border-radius: 5px;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  }

                  #loading-icon img {
                  width: 50px;
                  height: 50px;
                  margin-right: 10px;
                  }

                  #loading-icon span {
                  font-size: 16px;
                  font-weight: bold;
                  }
            </style>

            <script>
               const form = document.querySelector('#modal');
               const overlay = document.querySelector('#overlay');

               form.addEventListener('submit', (e) => {
               // Show the loading icon
               overlay.classList.add('show');
               });

               // Hide the loading icon when the page is loaded
               window.addEventListener('load', () => {
               overlay.classList.remove('show');
               });
            </script>

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
   //event.preventDefault();   
   //modal.style.display = "none";
   //srsvpBox.innerHTML = "<p>Registration Successful! See you at the venue.</p>";
  });





</script>




<section class="about-event">
    <p class="about-heading">About this event</p>
    <p><?php echo $article['event_about'] ?></p>
</section>
<section class="event-information">
    <div class="event-info-container">
        
      <i class="bi bi-clock"><span>When</span></i>
      <p><?php echo 'Date: '.$article['event_start_date']?></p>
        
      <p><?php echo 'Time: '.$article['event_start_time'].' - '.$article['event_end_time']?></p>
      
      <?php if (!empty($article['event_location'])) : ?>
         <i class="bi bi-geo-alt"><span>Where</span></i>
         <p><?php echo $article['event_location'] ?></p>
      <?php endif; ?>

      <i class="bi bi-eye"><span>Scope</span></i>
      <p><?php echo $article['event_scope'] ?></p>

      <i class="bi bi-people"><span>Available Slots</span></i>
      <p><?php echo $available_slots.'/'.$article['event_slots'] ?></p>

      <?php if (!empty($article['event_platform'])) : ?>
         <i class="bi bi-laptop"><span>Platform</span></i>
         <p><?php echo $article['event_platform'] ?></p>
      <?php endif; ?>

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
      echo 'We apologize, but we could not locate the article you are trying to access. It may no longer be available or may have been moved to a different location.';
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