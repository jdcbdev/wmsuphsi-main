<!-- Home Section Start  -->
<section class="home">

   <div class="swiper home-slider">
      <div class="swiper-wrapper">
         <!-- PHSI Carousel Start -->
         <?php 
         require_once '../classes/unesco_carousel_model.php';
         $carousel = new Carousel();
         //We will now fetch all the records in the array using loop
         //use as a counter, not required but suggested for the table
         $i = 1;
         //loop for each record found in the array
         foreach ($carousel->fetchAllRecords() as $value) { //start of loop
         $carousel_img = $value['filename'];
         $caousel_head = $value['carousel_title'];
         $carousel_body = $value['carousel_content'] ;
         ?>
         <section class="swiper-slide slide"  style="background: url('uploads/<?php echo $carousel_img; ?>') no-repeat;">
            <div class="content" id="unesco_content">
               <h3><?php echo $value['carousel_title'] ?></h3>
               <p><?php echo $value['carousel_content'] ?></p>
               <!--<a href="#" class="btn">Read more</a> -->
            </div>
         </section>
         <?php
         $i++;
      }
      //end loop
  ?>
         <!-- PHSI Carousel End -->
      </div>
      <!--Next/Prev Carousel Button-->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!--Current Carousel 3 dots-->
      <div class="swiper-pagination"></div>
   </div>

</section>
<!-- Home Section End  -->