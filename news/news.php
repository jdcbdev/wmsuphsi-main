<?php
    $page_title = 'News & Features | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<section class="heading-link">
   <h3>News & Feature</h3>
   <p> <a href="../home.php">Home</a> / News & Features</p>
</section>

<section class="announcements">

   <div class="box-container">
   <?php
  require_once '../classes/news_model.php'; 
  $news = new News();
  //We will now fetch all the records in the array using loop
  //use as a counter, not required but suggested for the table
  $i = 1;
  //loop for each record found in the array
  foreach ($news->fetchAllRecords() as $value){ //start of loop
?> 

      <div class="box">
         <div class="image">
            <img  src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['news_title']; ?>">
            <h3><?php echo $value['created_at']; ?></h3>
         </div>
         <div class="content">
            <h3><?php echo $value['news_title']; ?></h3>
            <!--<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, odit!</p>-->
            <a href="news-page.php" class="btn">Read more</a>
         </div>
      </div>


   <!--<div class="box hide">
      <div class="image">
         <img src="../images/content-images/phsi-p7.png" alt="">
         <h3>Date posted</h3>
      </div>
      <div class="content">
         <h3>Announcement Title</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, odit!</p>
         <a href="#" class="btn">Read more</a>
      </div>
   </div>


   <div class="box hide">
      <div class="image">
         <img src="../images/content-images/phsi-p8.png" alt="">
         <h3>Date posted</h3>
      </div>
      <div class="content">
         <h3>Announcement Title</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, odit!</p>
         <a href="#" class="btn">Read more</a>
      </div>
   </div>

   <div class="box hide">
      <div class="image">
         <img src="../images/content-images/phsi-p9.png" alt="">
         <h3>Date posted</h3>
      </div>
      <div class="content">
         <h3>Announcement Title</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, odit!</p>
         <a href="#" class="btn">Read more</a>
      </div>
   </div>-->

   <?php
   $i++;
//end of loop
}
?>


   </div>

   <div class="load-more"> <div class="btn">Load more</div> </div>



</section>







<?php
    require_once '../includes/footer.php';
?>