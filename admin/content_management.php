<?php

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../home.php');
    }
    //if the above code is false then html below will be displayed
    $content_management = 'active';
    require_once '../includes/admin-header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>

<!--<div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">Manage Carousel</h3>
                    <a href="../carousel/add-carousel.php" class="button">Add New Carousel</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="carousel-image">Image</th>
                        <th>Carousel Title</th>
                        <th>Description</th>
                        <th class="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                          
                            <td>1</td>
                            <td><img src="../images/carousel-images/phsi-carousel.jpg" alt=""></td>
                            <td>Peace and Human Security Institute</td>
                            <td>Peace is more than 
                                the absence of war, 
                                it is living together 
                                with our differences – 
                                of sex, race, language, 
                                religion or culture – while 
                                furthering universal respect 
                                for justice and human rights 
                                on which such coexistence depends.</td>
                            <td>
                                <div class="action">
                                <a class="action-edit" href="../carousel/edit-carousel.php">Edit</a>
                                    <a class="action-delete" href="../carousel/delete-carousel.php">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
      
                            <td>2</td>
                            <td><img src="../images/carousel-images/unesco-carousel.png" alt=""></td>
                            <td>Peace and Human Security Institute</td>
                            <td>Peace is more than 
                                the absence of war, 
                                it is living together 
                                with our differences – 
                                of sex, race, language, 
                                religion or culture – while 
                                furthering universal respect 
                                for justice and human rights 
                                on which such coexistence depends.
                                Peace is more than 
                                the absence of war, 
                                it is living together 
                                with our differences – 
                                of sex, race, language, 
                                religion or culture – while 
                                furthering universal respect 
                                for justice and human rights 
                                on which such coexistence dependss</td>
                            <td>
                                <div class="action">
                                    <a class="action-edit" href="../carousel/edit-carousel.php">Edit</a>
                                    <a class="action-delete" href="../carousel/delete-carousel.php">Delete</a>
                                </div>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>-->

        <div class="table-container">
            <div class="table-heading" >
                <h3 class="table-title">Manage Mission and Vision Page</h3>
                    <a href="../misvis/add-misvis.php" class="button">Add New Content</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th class="action">Action</th>
                    </tr>
                </thead>
                <tbody> 
                        <?php
                        require_once '../classes/misvis.class.php';
                        $misvis = new Misvis();
                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        //loop for each record found in the array
                        foreach ($misvis->show() as $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['misvis_title'] ?></td>
                            <td><?php echo $value['misvis_description'] ?></td>
                            <td>
                                <div class="action">
                                    <a class="action-edit" href="../misvis/edit-misvis.php?id=<?php echo $value['id'] ?>">Edit</a>
                                    <a class="action-delete" href="../misvis/delete-misvis.php?id=<?php echo $value['id'] ?>">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    //end of loop
                    }
                    ?>


                </tbody>
            </table>
        </div>

 <!-- Swiper Js link  -->
 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Custom Js file link  -->
<script src="js/script.js"></script>    

       
</body>
</html> 



