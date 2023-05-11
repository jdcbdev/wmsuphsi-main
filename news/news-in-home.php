<section class="announcements" style="background: #f9f9f9;">
   <h1 class="heading">News and Features </h1>
   <div class="box-container">
      <div class="box">

      <?php
         require_once 'classes/news_model.php'; 
         $news = new News();
         // Fetch all the records in the array using loop
         foreach ($news->fetchAllRecords() as $value) {
            // Display each news article in a box
      ?>
         <div class="image">
         <img src="uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['news_title']; ?>">
         <h3><?php echo $value['created_at']; ?></h3>
         </div>
         <div class="content">
         <h3><?php echo $value['news_title']; ?></h3>
            <a href="news/news-page.php?id=<?php echo $value['id']; ?>" class="btn">Read more</a>
         </div>
      </div>
      <?php } ?>
</section>