<?php
    $page_title = 'Administration | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<section class="heading-link">
   <h3>Administration</h3>
   <p> <a href="../home.php">Home</a> / Administration </p>
</section>

<!-- administration section starts  -->

<section class="administration">

   <h1 class="heading">WMSU - Peace and Human Security Institute</h1>

   <div class="swiper administration-slider">

      <div class="swiper-wrapper">

   <?php 
    require_once '../classes/administration_model.php';
    $administration = new Administration();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($administration->fetchAllRecords() as $value) { //start of loop
    ?>

         <div class="swiper-slide slide">
            <div class="image">
            <img src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['admin_name']; ?>">
               <!--<div class="share">
                  <a href="#" class="fab fa-facebook-f"></a>
                  <a href="#" class="fab fa-twitter"></a>
                  <a href="#" class="fab fa-instagram"></a>
                  <a href="#" class="fab fa-linkedin"></a>
               </div>-->
            </div>
            <div class="content">
               <h3><?php echo $value['admin_name'] ?></h3>
               <span><?php echo $value['admin_position'] ?></span>
            </div>
         </div>
         
         <?php $i++; } ?>

         
      </div>
   </div>

</section>



<!-- Administration Section Ends -->

<?php
    require_once '../includes/footer.php';
?>            