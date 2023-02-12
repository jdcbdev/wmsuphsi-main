<?php

    require_once '../tools/functions.php';
    require_once '../classes/misvis.class.php';
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

    //if add misvis is submitted
    if(isset($_POST['save'])){
        
        $misvis = new MisVis();

        //sanitize user inputs
        $misvis->misvis_title = htmlentities($_POST['misvis_title']);
        $misvis->misvis_description = htmlentities($_POST['misvis_description']);

    if(validate_add_misvis($_POST)){
        if($misvis->add()){
            //redirect user to faculty page after saving
            header('location: ../admin/content_management.php');
        }
    }
}

?>





<div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Content</h3>
                <a class="back" href="../admin/content_management.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="add-misvis.php" enctype='multipart/form-data' method="post">

                <label for="misvis_title">Content Title</label>
                <input type="text" id="misvis_title" name="misvis_title" placeholder="Enter Content Title" value="">

                <label for="misvis_description">Content Description</label>
                <input type="text" id="misvis_description" name="misvis_description" placeholder="Enter Content Description" value="">
                    
                <input type="submit" class="button" value="Add misvis" name="save" id="save">
                </form>
            </div>
</div>

 <!-- Swiper Js link  -->
 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Custom Js file link  -->
<script src="js/script.js"></script>    

       
</body>
</html> 
