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
    $page_title = 'PHSI News Content | WMSU - Peace and Human Security Institute';
    $phsi_news = 'active';
    
    require_once '../includes/admin-header.php';
    require_once '../includes/admin-sidebar.php';
    require_once '../includes/admin-topnav.php';
?>


<!--MISSION AND VISION START-->

<div class="gpt-table-container">
            <div class="add-button-container">
                <button class="gpt-add-button" id="add-new">Add New Content</button>
            </div>
            <table class="admin-table">
                <thead>
                <tr class="tr">
                    <th>ID Number</th>
                    <th>Thumbnail</th>
                    <th>Description</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
                </thead>
            <tbody id="fetch"></tbody>
            </table>
        </div>
        
        <div id="edit-modal" class="modal"></div>

<div id="add-modal" class="admin-modal">
    <div class="admin-modal-content">
        <span class="close">&times;</span>
        <h3 class="admin-modal-title">Add New Content</h3>
        <hr>
        <form id="addform" class="form-class" method="post" enctype="multipart/form-data">
            <label for="news_title" class="form-label">News Title</label>
            <div class="input-group">
                <input class="form-control" type="text" name="news_title" id="news_title" required>
            </div>
            
            <label for="file">Upload Image</label>
            <div class="preview">
                <img id="file-preview">
            </div>
            
            <div class="input-group">
                <input type="file" name="fileupload" id="fileupload" accept="image/*" onchange="showPreview(event)" required>
            </div>

            <label for="image_description" class="form-label">Image Description</label>
            <div class="input-group">
                <textarea class="form-control" type="text" name="image_description" id="image_description" rows="4" cols="50" required> </textarea>
            </div>

            <label for="news_content" class="form-label">News Content</label>
            <div class="input-group">
                <textarea class="form-control" type="text" name="news_content" id="news_content" rows="4" cols="50" required> </textarea>
            </div>

            <div class="input-group">
                <input type="submit" id="submit" name="submit" value="Save Image" class="form-btn btn-primary">
                <input type="reset" id="btn-reset" name="btn-reset" hidden>
            </div>
        </form>
    </div>
</div>
</section>
<!--MISSION AND VISION END-->


<!-- Custom Js file link  -->
<script src="js/script.js"></script>    

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/news.js"></script>



       
<?php
    require_once '../includes/admin-footer.php';
?>





    
