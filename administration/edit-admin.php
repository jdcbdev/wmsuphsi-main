<?php

    require_once '../classes/administration_model.php';

    $update_id = $_POST['update_id'];

    $administration = new Administration();

    $value = $administration->edit($update_id);

    if(!empty($value)) {

?>

<div class="modal-content">
    <span class="close">&times;</span>
    <h3 class="modal-title">Edit Content</h3>
    <hr>
    <form id="editform" class="form-class" method="post" enctype="multipart/form-data">
        <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $value['id']; ?>">
        
            <label for="edit_name" class="form-label">Name</label>
            <div class="input-group">
                <input class="form-control" type="text" name="edit_name" id="edit_name" value="<?php echo $value['admin_name']; ?>" required>
            </div>
            
            <!--EDIT IMAGE--> 
            <label for="file">Upload Image</label>
            <div class="hidden-preview">
                <img id="current-file-preview" src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['admin_name']; ?>">
            </div>

            <div class="preview">
                <img id="file-preview" src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['admin_name']; ?>">
            </div>

            <label for="edit_organization" class="form-label">Organization</label>
            <div class="input-group">
                <input class="form-control" type="text" name="edit_organization" id="edit_organization" value="<?php echo $value['admin_organization']; ?>" required>
            </div>

            <label for="edit_position" class="form-label">Position</label>
            <div class="input-group">
                <input class="form-control" type="text" name="edit_position" id="edit_position" value="<?php echo $value['admin_position']; ?>" required> 
            </div>

            <div class="input-group">
                <input type="submit" id="submit" name="submit" value="Save" class="form-btn btn-primary">
                <input type="reset" id="btn-reset" name="btn-reset" hidden>
            </div>
    </form>
</div>
	
<?php
}
?>