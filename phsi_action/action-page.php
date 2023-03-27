<?php
    $page_title = 'Call for Actions | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<!-- Mission and Vission Section starts  -->

<section class="news">

<?php
  require_once '../classes/phsi_action_model.php'; 
  $action = new Action();

  // Check if the article ID is set in the URL
  if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    $article = $action->fetchRecordById($article_id);

    if ($article) {
?>
    <div class="news-content">
      <h3 class="news-title"><?php echo $article['title'] ?></h3>
      
      <div class="image">
      <img src="../uploads/<?php echo $article['filename']; ?>" alt="<?php echo $article['title']; ?>">
    </div>

    <div class="desc">
    <p></p>
    </div>

      <p><?php echo $article['details'] ?></p>
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

<!--  Mission and Vission section ends -->






<?php
    require_once '../includes/footer.php';
?>