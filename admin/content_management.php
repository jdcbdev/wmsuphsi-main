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

<div class="table-container">
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
                            <!-- always use echo to output PHP values -->
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
                            <!-- always use echo to output PHP values -->
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
        </div>



       
</body>
</html> 



