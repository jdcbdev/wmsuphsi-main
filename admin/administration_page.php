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
    $history_page = 'active';
    require_once '../includes/admin-header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>


<!--HISTORY START-->
<section>
    <div class="table-container" >
        <div class="table-heading" >
            <h3 class="table-title">PHSI - ADMINISTRATION PAGE</h3>
            <button class="button" id="add-new">Add New Content</button>
        </div>
        <table id="misvis-table" class="table display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Organization</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="fetch"></tbody>
            </table>
        </div>
        
        <div id="edit-modal" class="modal"></div>

<div id="add-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 class="modal-title">Add New Content</h3>
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






<!--DELETE ANNOUNCEMENT WARNING BOX
<div id="delete-dialog" class="dialog" title="Delete Content">
    <p><span>Are you sure you want to delete the selected record?</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#delete-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".action-delete").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#delete-dialog").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "Cancel" : function() {
                    $(this).dialog("close");
                }
            });

            $("#delete-dialog").dialog("open");
        });
    });   
</script>-->


    
