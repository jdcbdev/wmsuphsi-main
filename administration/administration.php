<?php
    $page_title = 'Administration | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
?>

<section class="heading-link">
   <h3>Administration</h3>
   <p> <a href="../home.php">Home</a> / Administration </p>
</section>

<!-- teachers section starts  -->

<section class="event-organizers">



   <div class="box-container container">

   <?php 
    require_once '../classes/administration_model.php';
    $administration = new Administration();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($administration->fetchAllRecords() as $value) { //start of loop
    ?>


      <div class="box">
         <img src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['admin_name']; ?>">
         <div class="admin-info">
         <h3><?php echo $value['admin_name'] ?></h3>
         <p><?php echo $value['admin_position'] ?></p>
         </div>
      </div>
      <?php
   $i++;
    }
    //end loop
?>

  
   </div>


</section>

<!-- Administration Section Ends -->

<?php
    require_once '../includes/footer.php';
?>            