<?php
    $page_title = 'Contact | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<section class="heading-link">
   <h3>Contact</h3>
   <p> <a href="../home.php">Home</a> / Contact </p>
</section>

<!-- contact section starts  -->

<section class="contact">

   <h1 class="heading"> Get in touch </h1>

   <div class="icons-container">
    
    <div class="icons">
         <i class="fas fa-map"></i>
         <h3>Location :</h3>
         <p>Executive Building, Western Mindanao State University, Normal Road, Baliwasan, Zamboanga City</p>
      </div>

      <div class="icons">
         <i class="fas fa-phone"></i>
         <h3>Phone :</h3>
         <p>09171254009</p>
         <p>09056088968</p>
         <p>09178881897</p>
      </div>

      <div class="icons">
         <i class="fas fa-envelope"></i>
         <h3> Email : </h3>
         <p>wmsu.phsi2021@gmail.com<p>
      </div>

   </div>

   <div class="row">
   <div class="mapouter">
    <div class="gmap_canvas">
        <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=662&amp;height=340&amp;hl=en&amp;q=Executive Building, Western Mindanao State University, Normal Road, Baliwasan, Zamboanga City&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
        </iframe><a href="https://www.gachacute.com/">Download</a></div>
            <style>.mapouter{position:relative;text-align:right;width:50%;height:500px;}
            .gmap_canvas {overflow:hidden;background:none!important;width:100%;height:340px;}
            .gmap_iframe {height:340px!important;}
            </style>
            </div>

      <form action="">
         <h3>Send us a message</h3>
         <input type="text" placeholder="Name" class="box">
         <input type="email" placeholder="Email" class="box">
         <input type="number" placeholder="Phone" class="box">
         <textarea name="" class="box" placeholder="Message" id="" cols="30" rows="10"></textarea>
         <input type="submit" value="Send message" class="btn">
      </form>

   </div>

</section>

<!-- contact section ends -->





<?php
    require_once '../includes/footer.php';
?>