<?php
    $page_title = 'Upcoming Events | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>


<!-- Event Section Start  -->

<section class="event-heading">
    <div class="img"><img src="../images/content-images/unesco-ncm.png" alt="">
    <div class="event-content">
        <h2 class="event-title">Registration ends at Feb 18, 2023</h2>
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
            <form class="modal-form" id="modal-form" method="POST">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" required>

                <label for="middle-name">Middle Name:</label>
                <input type="text" id="middle-name" name="middle-name">

                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" required>

                <label for="suffix">Suffix:</label>
                <input type="text" id="suffix" name="suffix">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" required>

                <input type="submit" id="submit" name="submit" value="Submit">  
            </form>
        </div>
    </div>
    </div>
</section>

<section class="about-event">
    <p class="about-heading">About this event</p>
    <p>With the theme: "Pagkakaisa at Paghilom: Isang Bansa para sa Kapayapaan," held at the Juanito Bruno Gymnasium from 11 AM to 5 PM. The celebration aims to bring Filipinos together and join hands in healing the wounds of the past and using those lessons to pave the way for a bright future free of violence, prejudice, and hatred.</p>
</section>

<section class="event-information">
    <div class="event-info-container">
        <i class="bi bi-clock"><span>When</span></i>
        <p>Sept 28, 2022 11:00 AM - 5:00 PM</p>
        <i class="bi bi-geo-alt"><span>Where</span></i>
        <p>Normal Rd, Zamboanga, WMSU Juanito Bruno Gymnasium</p>
        <i class="bi bi-eye"><span>Scope</span></i>
        <p>WMSU Students</p>
        <i class="bi bi-people"><span>Slots</span></i>
        <p>100 / 100</p>
        <i class="bi bi-laptop"><span>Platform</span></i>
        <p>The event will be conducted at its location.</p>
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

<script src="../js/modal.js"></script>

<!-- Event Section End -->


<?php
    require_once '../includes/footer.php';
?>