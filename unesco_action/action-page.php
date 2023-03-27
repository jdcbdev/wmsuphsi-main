<?php
    $page_title = 'News & Features | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<!-- Mission and Vission Section starts  -->

<section class="news">

<?php
  require_once '../classes/unesco_action_model.php'; 
  $action = new Action();
  //We will now fetch all the records in the array using loop
  //use as a counter, not required but suggested for the table
  $i = 1;
  //loop for each record found in the array
  foreach ($action->fetchAllRecords() as $value){ //start of loop
?>

    <div class="news-content">
      <h3 class="news-title"><?php echo $value['news_title'] ?></h3>
      
      <div class="image">
      <img src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['news_title']; ?>">
    </div>

    <div class="desc">
    <p><?php echo $value['image_description'] ?></p>
    </div>

      <p><?php echo $value['news_content'] ?></p>
   <?php
   $i++;
//end of loop
}
?>
   

</section>

<!--  Mission and Vission section ends -->






<?php
    require_once '../includes/footer.php';
?>