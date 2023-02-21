<?php

    require_once '../classes/news_model.php';

    $update_id = $_POST['update_id'];

    $news = new News();

    $value = $news->edit($update_id);

    if(!empty($value)) {

?>

<div class="modal-content">
    <span class="close">&times;</span>
    <h3 class="modal-title">Edit Content</h3>
    <hr>
    <form id="editform" class="form-class" method="post" enctype="multipart/form-data">
        <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $value['id']; ?>">
        
        <!--EDIT TITLE--> 
        <label for="edit_title" class="form-label">Title</label>
        <div class="input-group">
            <input class="form-control" type="text" name="edit_title" id="edit_title" value="<?php echo $value['news_title']; ?>" required>
        </div>

        <!--EDIT IMAGE--> 
        <label for="file">Upload Image</label>
        <div class="hidden-preview">
            <img id="current-file-preview" src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['news_title']; ?>">
        </div>

        <div class="preview">
            <img id="file-preview" src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['news_title']; ?>">
        </div>

        <div class="input-group">
            <input type="file" name="fileupload" id="fileupload" accept="image/*" onchange="showPreview(event);">
        </div>
                
        <!--IMAGE DESCRIPTION--> 
        <label for="edit_description" class="form-label">Description</label>
        <div class="input-group">
            <textarea class="form-control" type="text" name="edit_description" id="edit_description" rows="4" cols="50" required><?php echo $value['image_description']; ?> </textarea>
        </div>

        <!--NEWS CONTENT-->
        <label for="edit_content" class="form-label">News Content</label>
        <div class="input-group">
            <textarea class="form-control" type="text" name="edit_content" id="edit_content" rows="4" cols="50" required><?php echo $value['news_content']; ?></textarea>
        </div>

        <div class="input-group">
            <input type="submit" id="submit" name="submit" value="Save Image" class="form-btn btn-primary">
            <input type="reset" id="btn-reset" name="btn-reset" hidden>
        </div>
    </form>
</div>
	
<?php
}
?>