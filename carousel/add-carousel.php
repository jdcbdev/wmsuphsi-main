<?php

    require_once '../tools/functions.php';
    require_once '../classes/carousel.class.php';
    require_once '../tools/variables.php';
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

    //if add carousel is submitted
    if(isset($_POST['save'])){
        
        $carousel = new Carousel();

        //sanitize user inputs
        $carousel_image_name = $_FILES['carousel_image']['name'];
        $tmp_carousel_image_name = $_FILES['carousel_image']['tmp_name'];
        $folder = 'arjay/';
        move_uploaded_file($tmp_carousel_image_name, $folder.$carousel_image_name); 

        $carousel->carousel_title = htmlentities($_POST['carousel_title']);
        $carousel->carousel_description = htmlentities($_POST['carousel_description']);

    if(validate_add_carousel($_POST)){
        if($carousel->add()){
            //redirect user to faculty page after saving
            header('location: ../admin/carousel_management.php');
        }
    }
}

?>





<div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Carousel</h3>
                <a class="back" href="../admin/content_management.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="add-carousel.php" enctype='multipart/form-data' method="post">
                   
                <label for="carousel_image">Carousel Image</label>
                <input type='file'  name='carousel_image'>

                <label for="carousel_title">Carousel Title</label>
                <input type="text" id="carousel_title" name="carousel_title" placeholder="Enter Carousel Title" value="">

                <label for="carousel_description">Carousel Description</label>
                <input type="text" id="carousel_description" name="carousel_description" placeholder="Enter Carousel Description" value="">
                    
                <input type="submit" class="button" value="Add Carousel" name="save" id="save">
                </form>
            </div>
</div>