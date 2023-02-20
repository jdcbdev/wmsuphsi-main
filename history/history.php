<?php
    $page_title = 'History | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<section class="heading-link">
   <h3>History</h3>
   <p> <a href="../home.php">Home</a> / History </p>
</section>

<!-- History Section starts  -->

<section class="history">

    <?php 
    require_once '../classes/history_model.php';
    $history = new History();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($history->fetchAllRecords() as $value) { //start of loop
    ?>

    <div class="content">
      <h3 class="about-title"><?php echo $value['history_title'] ?></h3>
      <p><?php echo $value['history_description'] ?></p>
   </div>
   <div class="image">
    <img src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['history_title']; ?>">
   </div>

   <?php
   $i++;
    }
    //end loop
?>

   

</section>

<!-- Hisroty section ends -->


<?php
    require_once '../includes/footer.php';
?>