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
   <?php
      require_once '../classes/news_model.php'; 
      $news = new News();

      // Fetch all the records in the array using loop
      $all_news = $news->fetchAllRecords();

      // Sort the news array by date (most recent first)
      usort($all_news, function($a, $b) {
         return strtotime($b['created_at']) - strtotime($a['created_at']);
      });

      // Display the most recent news article on the right side
      $most_recent = array_shift($all_news);
   ?>
   <div class="box-container">
      <div class="box-right box">
         <div class="image">
            <img src="../uploads/<?php echo $most_recent['filename']; ?>" alt="<?php echo $most_recent['news_title']; ?>">
            <h3><?php echo $most_recent['created_at']; ?></h3>
         </div>
         <div class="content">
            <h3><?php echo $most_recent['news_title']; ?></h3>
            <a href="news-page.php?id=<?php echo $most_recent['id']; ?>" class="btn">Read more</a>
         </div>
      </div>

      <?php foreach ($all_news as $value) { ?>
         <div class="box">
            <div class="image">
               <img src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['news_title']; ?>">
               <h3><?php echo $value['created_at']; ?></h3>
            </div>
            <div class="content">
               <h3><?php echo $value['news_title']; ?></h3>
               <a href="news-page.php?id=<?php echo $value['id']; ?>" class="btn">Read more</a>
            </div>
         </div>
      <?php } ?>
   </div>

   <div class="load-more"> <div class="btn">Load more</div> </div>

</section>

<?php require_once '../includes/footer.php'; ?>
