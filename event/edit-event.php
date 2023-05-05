


<?php

    require_once '../classes/event_model.php';
    require_once '../vendor/autoload.php';

    $update_id = $_POST['update_id'];

    $event = new Event();

    $value = $event->edit($update_id);

    if(!empty($value)) {

?>



<div class="admin-modal-content">
    <span class="close">&times;</span>
    <h3 class="modal-title">Edit Event</h3>
    <hr>
    <form id="editform" class="form-class" method="post" enctype="multipart/form-data">
    <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $value['id']; ?>">

            <!--EVENT TITLE-->
            <label for="edit_title" class="form-label">Event Name</label>
            <div class="input-group">
                <input class="form-control" type="text" name="edit_title" id="edit_title" value="<?php echo $value['event_title']; ?>" required>
            </div>     

            <!--EVENT BANNER-->
            <label for="file">Upload Event Banner</label>
            <div class="hidden-preview">
                <img id="current-file-preview" src="../uploads/<?php echo $value['event_banner']; ?>" >
            </div>  

            <div class="preview">
                <img id="file-preview" src="../uploads/<?php echo $value['event_banner']; ?>" alt="<?php echo $value['event_title']; ?>">
            </div>

            <!--EVENT BANNER UPLOAD BUTTON-->
            <div class="input-group">
                <p style="font-size: 12px;color: red;font-style: italic;font-weight: lighter;">Max of 5mb. Accepted File Types: .jpg, .jpeg, .png</p>
                <input type="file" name="event_banner" id="event_banner" accept="image/*" onchange="showPreview(event)" >
            </div> 

            <!--EVENT ABOUT-->
            <label for="edit_about" class="form-label">About this Event</label>
            <div class="input-group">
                <textarea style="height: 300px; width: 100%;" class="form-control" type="text" name="edit_about" id="edit_about" rows="4" cols="50" required><?php echo $value['event_about']; ?></textarea>
            </div>

            <!--EVENT MODE: ACTUAL OR VIRTUAL-->
            <label for="edit_mode" style="font-weight: bold;">Event Mode</label>
            <div class="input-group">
                <select id="edit_mode" name="edit_mode" onchange="displayInputBox()" >
                    <option value="">--Select Mode--</option>
                    <option value="On-site"<?php if ($value['event_mode'] == 'On-site') { echo ' selected'; } ?>>On-site</option>
                    <option value="Virtual"<?php if ($value['event_mode'] == 'Virtual') { echo ' selected'; } ?>>Virtual</option>
                    <option value="Hybrid"<?php if ($value['event_mode'] == 'Hybrid') { echo ' selected'; } ?>>Hybrid (On-site & Virutal Setup)</option>
                </select>
            </div>


            <div id="event_platform_input" style="display:none;">
                <label for="event_platform" class="form-label" style="font-weight: bold;">Online Platform Link</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="edit_platform" id="edit_platform" value="<?php echo $value['event_platform']; ?>">
                </div>
            </div>

            <div id="event_location_input" style="display:none;">
                <label for="edit_location" class="form-label" style="font-weight: bold;">Location</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="edit_location" id="edit_location" value="<?php echo $value['event_location']; ?>" >
                </div>
            </div>

            <script>
                function displayInputBox() {
                    var eventMode = document.getElementById("edit_mode").value;

                    if (eventMode == "On-site") {
                        document.getElementById("event_location_input").style.display = "block";
                        document.getElementById("event_platform_input").style.display = "none";
                    } else if (eventMode == "Virtual") {
                        document.getElementById("event_platform_input").style.display = "block";
                        document.getElementById("event_location_input").style.display = "none";
                    } else if (eventMode == "Hybrid") {
                        document.getElementById("event_platform_input").style.display = "block";
                        document.getElementById("event_location_input").style.display = "block";
                    } else {
                        document.getElementById("event_platform_input").style.display = "none";
                        document.getElementById("event_location_input").style.display = "none";
                    }
                }
            </script>

            <label for="duration" class="form-label" style="font-weight: bold;">Event Schedule</label>
            <label for="edit_start_date" class="form-label">From</label>
            <div class="input-group">
                <input class="form-control" type="date" name="edit_start_date" id="edit_start_date" value="<?php echo $value['event_start_date']; ?>" required>
            </div>
            <label for="edit_end_date" class="form-label">To</label>
            <div class="input-group">
                <input class="form-control" type="date" name="edit_end_date" id="edit_end_date" value="<?php echo $value['event_end_date']; ?>" required>
            </div>

            
            <label for="time" class="form-label" style="font-weight: bold;">Time</label>
            <label for="edit_start_time" class="form-label">From</label>
            <div class="input-group">
                <input class="form-control" type="time" name="edit_start_time" id="edit_start_time" value="<?php echo $value['event_start_time']; ?>" required>
            </div>
            <label for="edit_end_time" class="form-label">To</label>
            <div class="input-group">
                <input class="form-control" type="time" name="edit_end_time" id="edit_end_time" value="<?php echo $value['event_end_time']; ?>" required>
            </div>



            <!--EVENT SLOTS (CAPACITY)-->
            <label for="edit_slots" class="form-label">Slots</label>
            <div class="input-group">
                <input class="form-control" type="number" name="edit_slots" id="edit_slots" value="<?php echo $value['event_slots']; ?>" required>
            </div>

            <!--EVENT SCOPE-->
            <label for="edit_scope" class="form-label" style="font-weight: bold;">Scope</label>
            <div class="input-group" style="gap: 1rem;">
                <div>
                <input type="checkbox" name="edit_scope" id="student" value="Unesco" <?php if ($value['event_scope'] == 'Unesco') echo 'checked'; ?>>
                    <label for="unesco">WMSU UNESCO Club</label>
                </div>
                <div>
                <input type="checkbox" name="edit_scope" id="student" value="Student" <?php if ($value['event_scope'] == 'Student') echo 'checked'; ?>>
                    <label for="student">Student</label>
                </div>
                <div>
                <input type="checkbox" name="edit_scope" id="employee" value="Employee" <?php if ($value['event_scope'] == 'Employee') echo 'checked'; ?>>
                    <label for="none">Employee</label>
                </div>
                <div>
                <input type="checkbox" name="edit_scope" id="alumni" value="Alumni" <?php if ($value['event_scope'] == 'Alumni') echo 'checked'; ?>>
                    <label for="alumni">Alumni</label>
                </div>
                <div>
                <input type="checkbox" name="edit_scope" id="non-affiliate" value="Non-Affiliate" <?php if ($value['event_scope'] == 'Non-Affiliate') echo 'checked'; ?>>
                    <label for="non-affiliate">Non-affiliate</label>
                </div>
                <div>
                <input type="checkbox" name="edit_scope" id="all" value="All" onchange="handleAllCheck()" <?php if ($value['event_scope'] == 'All') echo 'checked'; ?> >
                    <label for="all">All</label>
                </div>
            </div>

            <script>
                function handleAllCheck() {
                        const allCheckbox = document.getElementById("all");
                        const otherCheckboxes = document.querySelectorAll('input[name="edit_scope"]:not(#all)');

                        if (allCheckbox.checked) {
                            otherCheckboxes.forEach(checkbox => checkbox.checked = true);
                        } else {
                            otherCheckboxes.forEach(checkbox => checkbox.checked = false);
                        }
                }
            </script>

      
            <!--EVENT REGISTRATION DUE-->
            <label for="edit_reg_duedate" class="form-label" style="font-weight: bold;">Registration Due</label>
            <div class="input-group">
                <input class="form-control" type="date" name="edit_reg_duedate" id="edit_reg_duedate" value="<?php echo $value['event_reg_duedate']; ?>" required>
            </div>


            <div class="input-group">
            <input type="submit" id="submit" name="submit" value="Save Changes" class="form-btn btn-primary">
            <input type="reset" id="btn-reset" name="btn-reset" hidden>
            
</div>
</form>


<div id="loading-icon" style="display:none;">
            <img src="../images/content-images/loading.gif" alt="loading">
            <span>Loading...</span>
        </div>


        <style>
            #loading-icon {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 9999;
                background-color: rgba(255, 255, 255, 0.5);
                padding: 10px;
                border-radius: 5px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #loading-icon img {
                width: 50px;
                height: 50px;
                margin-right: 10px;
            }

            #loading-icon span {
                font-size: 16px;
                font-weight: bold;
            }
        </style>

</div>
	
<?php
}
?>


<!--Rich-text formatting-->
<script src="https://cdn.tiny.cloud/1/0wux44nqahq53096g39102o1z4slhup9i4hc3lkj0i7oxj2s/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#edit_about'
    });
</script>
