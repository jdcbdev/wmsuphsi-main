<?php
  $page_title = 'News & Features | WMSU - Peace and Human Security Institute';
  require_once '../includes/head.php';
  require_once '../includes/header.php';
?>

<!-- News Section starts  -->

<section class="news">

<?php
  require_once '../classes/news_model.php'; 
  $news = new News();

  // Check if the article ID is set in the URL
  if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    $article = $news->fetchRecordById($article_id);

    if ($article) {
?>
      <div class="news-content">
        <h3 class="news-title"><?php echo $article['news_title'] ?></h3>
      
        <div class="image">
          <img src="../uploads/<?php echo $article['filename']; ?>" alt="<?php echo $article['news_title']; ?>">
        </div>

        <div class="desc">
          <p><?php echo $article['image_description'] ?></p>
        </div>

        <p><?php echo $article['news_content'] ?></p>
      </div>
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

</section>

<!-- News section ends -->

<?php
  require_once '../includes/footer.php';
?>
