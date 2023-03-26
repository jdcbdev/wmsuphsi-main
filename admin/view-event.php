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

    require_once '../tools/variables.php';
    $page_title = 'Peace Edukasyon | WMSU - Peace and Human Security Institute';
    $phsi_events = 'active';

    require_once '../includes/admin-header.php';
?>

<body>

    <?php require_once '../includes/admin-topnav.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once '../includes/admin-sidebar.php'; ?>

            <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10 p-md-4">
                <div class="w-100">
                    <h5 class="col-12 fw-bold mb-3 mt-3 mt-md-0">Peace Edukasyon</h5>
                    <ul class="nav nav-tabs application">

                        <li class="nav-item active" id="li-pending">
                            <a class="nav-link">Event Attendees<span class="counter" id="counter-all">3</span></a>
                        </li>

                        <li class="nav-item" id="add-account">
                            <a class="nav-link" id="add-new">Add Attendee</a>
                        </li>
                    </ul>
                    <div class="table-responsive py-3 table-container">
                    <div class="row g-2 mb-2 ">
                        
                    <div id="MyButtons" class="d-flex mb-md-2 mb-lg-0 col-12 col-md-auto"></div>
                    
                    <div class="input-group search-keyword col-12 flex-lg-grow-1">
                        <input type="text" name="keyword" id="keyword" placeholder="Search Name" class="form-control">
                        <button class="btn btn-outline-secondary background-color-green" type="button"><i class="fas fa-search white"></i></button>
                    </div>
                </div>
                
                <table class="table table-hover col-12" id="table-pending" style="width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">Action</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Organization</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php
    
    require_once '../classes/user.class.php';
    
    $user = new Users();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($user->addUserToEvent() as $value){ 
        //start of loop
    ?>
    
    <tr>
    <!-- always use echo to output PHP values -->
    <td>
        <div class="action-button">
            <a title="View" href="view-event.php" class="me-2 green" id="view" value="<?php echo $value['id']; ?>"><i class="fa-solid fa-eye"></i></a>
            <a title="Edit" href="#" class="me-2 green" id="edit" value="<?php echo $value['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
            <a title="Delete" href="#" class="green" id="delete" value="<?php echo $value['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
        </div>
    </td>
    <td><?php echo $value['firstname'] ?></td>
    <td><?php echo $value['email'] ?></td>
    <td>Student</td>
    <td>WMSU UNESCO Club</td>
    <td><?php echo $value['contact_number'] ?></td>
    <td>Guiwan, Zamboanga del Sur</td>
    </tr>

    

    <?php $i++; } ?> 

                </tbody>
            </table>
        </div>
        
        <div id="edit-modal" class="modal"></div>

<div id="add-modal" class="admin-modal">
    <div class="admin-modal-content">
        <span class="close">&times;</span>
        <h3 class="admin-modal-title">Add New Content</h3>
        <hr>

        <form id="addform" class="form-class" method="post" enctype="multipart/form-data">
            <label for="history_title" class="form-label">Content Title</label>
            <div class="input-group">
                <input class="form-control" type="text" name="history_title" id="history_title" required>
            </div>
            
            <label for="file">Upload Image</label>
            <div class="preview">
                <img id="file-preview">
            </div>
            
            <div class="input-group">
                <input type="file" name="fileupload" id="fileupload" accept="image/*" onchange="showPreview(event)" required>
            </div>

            <label for="history_description" class="form-label">Image Description</label>
            <div class="input-group">
                <textarea class="form-control" type="text" name="history_description" id="history_description" rows="4" cols="50" required> </textarea>
            </div>

            <div class="input-group">
                <input type="submit" id="submit" name="submit" value="Save Image" class="form-btn btn-primary">
                <input type="reset" id="btn-reset" name="btn-reset" hidden>
            </div>
        </form>

        
    </div>
</div>
</section>
<!--HISTORY END-->

 <!-- Swiper Js link  -->
 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Custom Js file link  -->
<script src="js/script.js"></script>    

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/history.js"></script>


       
<?php
    require_once '../includes/admin-footer.php';
?>



    
