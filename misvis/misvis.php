<?php
    $page_title = 'Mission and Vision | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<section class="heading-link">
   <h3>Mission & Vision</h3>
   <p> <a href="../home.php">Home</a> / Mission & Vision </p>
</section>

<!-- Mission and Vission Section starts  -->

<section class="misvis">
    <?php
    require_once '../classes/misvis.class.php';
    $misvis = new Misvis();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($misvis->show() as $value){ //start of loop
    ?>
    <div class="misvis-content">
      <h3 class="misvis-title"><?php echo $value['misvis_title'] ?></h3>
      <p><?php echo $value['misvis_description'] ?></p>
   </div>
   <!--<div class="image">
      <img src="../images/content-images/phsi-p6.png" alt="">
   </div>-->
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