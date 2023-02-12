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
    //if the above code is false then code and html below will be executed  
    $misvis = new MisVis();
    //if edit misvis is submitted
    if(isset($_POST['save'])){
        

        //sanitize user inputs
        $misvis->id = $_POST['id'];
        $misvis->misvis_title = htmlentities($_POST['misvis_title']);
        $misvis->misvis_description = htmlentities($_POST['misvis_description']);

    if(validate_add_misvis($_POST)){
        if($misvis->edit()){
            //redirect user to faculty page after saving
            header('location: ../admin/content_management.php');
        }
    }
}else{
    if ($misvis->fetch($_GET['id'])){
        $data = $misvis->fetch($_GET['id']);
        
        $_POST['misvis_title'] = $data['misvis_title'];
        $_POST['misvis_description']= $data['misvis_description'];

    }
}

?>





<div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Content</h3>
                <a class="back" href="../admin/content_management.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="edit-misvis.php" enctype='multipart/form-data' method="post">
                
                <input type="text" hidden name="id" value="<?php echo $_GET['id'] ?>">

                <label for="misvis_title">Content Title</label>
                <input type="text" id="misvis_title" name="misvis_title" placeholder="Edit Content Title"  value="<?php if(isset($_POST['misvis_title'])) { echo $_POST['misvis_title'];  }?>">
                
                <?php if(isset($_POST['save']) && !validate_misvis_title($_POST)){ ?>
                <p class="error">Content Title is invalid. Trailing spaces will be ignored.</p>
                <?php } ?>


                <label for="misvis_description">Content Description</label>
                <input type="text" id="misvis_description" name="misvis_description" placeholder="Enter Content Description" value="<?php if(isset($_POST['misvis_description'])) { echo $_POST['misvis_description']; } ?>">

                <?php if(isset($_POST['save']) && !validate_misvis_description($_POST)){ ?>
                <p class="error">Content description is invalid. Trailing spaces will be ignored.</p>
                <?php } ?>

                <input type="submit" class="button" value="Edit misvis" name="save" id="save">
                </form>
            </div>
</div>

 <!-- Swiper Js link  -->
 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Custom Js file link  -->
<script src="js/script.js"></script>    

       
</body>
</html> 
