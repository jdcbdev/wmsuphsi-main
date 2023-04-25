<?php

    require_once '../classes/event_model.php';

    $update_id = $_POST['update_id'];

    $event = new Event();

    $value = $event->edit($update_id);

    if(!empty($value)) {

?>

<div class="admin-modal-content">
    <span class="close">&times;</span>
    <h3 class="modal-title">Edit Content</h3>
    <hr>
    <form id="addform" class="form-class" method="post" enctype="multipart/form-data">
    <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $value['id']; ?>">

            <!--EVENT ORGANIZER-->
            <label for="event_organizer" class="form-label" style="font-weight: bold;">Organizer</label>
            <div class="input-group" style="gap: 1rem;">
                <div>
                    <input type="checkbox" name="edit_organizer" id="unesco" value="">
                    <label for="unesco">WMSU-PHSI</label>
                </div>
                <div>
                    <input type="checkbox" name="edit_organizer" id="phsi" value="">
                    <label for="phsi">WMSU UNESCO Club</label>
                </div>
            </div>


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
    <input type="file" name="file_upload" id="event_banner" accept="image/*" onchange="showPreview(event)" >
</div> 

<!--EVENT ABOUT-->
<label for="edit_about" class="form-label">About this Event</label>
<div class="input-group">
    <textarea class="form-control" type="text" name="edit_about" id="edit_about" rows="4" cols="50" required><?php echo $value['event_about']; ?></textarea>
</div>
<!--EVENT MODE: ACTUAL OR VIRTUAL-->
<label for="event_mode" style="font-weight: bold;">Event Mode</label>
            <div class="input-group">
                <select id="event_mode" name="event_mode" onchange="displayInputBox()" value="<?php echo $value['event_mode']; ?>>
                    <option value="">--Select Mode--</option>
                    <option value="On-site">On-site</option>
                    <option value="Virtual">Virtual</option>
                </select>
            </div>

            <div id="event_platform_input" style="display:none;">
                <label for="event_platform" class="form-label" style="font-weight: bold;">Online Platform Link</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="event_platform" id="event_platform" value="<?php echo $value['event_platform']; ?>">
                </div>
            </div>

            <div id="event_location_input" style="display:none;">
                <label for="event_location" class="form-label" style="font-weight: bold;">Location</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="event_location" id="event_location" value="<?php echo $value['event_location']; ?>" >
                </div>
            </div>

            <script>
                function displayInputBox() {
                    var eventMode = document.getElementById("event_mode").value;

                    if (eventMode == "On-site") {
                        document.getElementById("event_location_input").style.display = "block";
                        document.getElementById("event_platform_input").style.display = "none";
                    } else if (eventMode == "Virtual") {
                        document.getElementById("event_platform_input").style.display = "block";
                        document.getElementById("event_location_input").style.display = "none";
                    } else {
                        document.getElementById("event_platform_input").style.display = "none";
                        document.getElementById("event_location_input").style.display = "none";
                    }
                }
            </script>

<label for="duration" class="form-label" style="font-weight: bold;">Event Schedule</label>
            <label for="event_start_date" class="form-label">From</label>
            <div class="input-group">
                <input class="form-control" type="date" name="event_start_date" id="event_start_date" value="<?php echo $value['event_start_date']; ?>" required>
            </div>
            <label for="event_end_date" class="form-label">To</label>
            <div class="input-group">
                <input class="form-control" type="date" name="event_end_date" id="event_end_date" value="<?php echo $value['event_end_date']; ?>" required>
            </div>

            
            <label for="time" class="form-label" style="font-weight: bold;">Time</label>
            <label for="event_start_time" class="form-label">From</label>
            <div class="input-group">
                <input class="form-control" type="time" name="event_start_time" id="event_start_time" value="<?php echo $value['event_start_time']; ?>" required>
            </div>
            <label for="event_end_time" class="form-label">To</label>
            <div class="input-group">
                <input class="form-control" type="time" name="event_end_time" id="event_end_time" value="<?php echo $value['event_end_time']; ?>" required>
            </div>









<!--EVENT SLOTS (CAPACITY)-->
<label for="event_slots" class="form-label">Slots</label>
<div class="input-group">
    <input class="form-control" type="number" name="event_slots" id="event_slots" value="<?php echo $value['event_slots']; ?>" required>
</div>


            <!--EVENT SCOPE-->
            <label for="event_scope" class="form-label" style="font-weight: bold;">Scope</label>
            <div class="input-group" style="gap: 1rem;">
                <div>
                    <input type="checkbox" name="event_scope[]" id="unesco" value="Unesco">
                    <label for="unesco">WMSU UNESCO Club</label>
                </div>
                <div>
                    <input type="checkbox" name="event_scope[]" id="student" value="Student">
                    <label for="student">Student</label>
                </div>
                <div>
                    <input type="checkbox" name="event_scope[]" id="employee" value="Employee">
                    <label for="none">Employee</label>
                </div>
                <div>
                    <input type="checkbox" name="event_scope[]" id="alumni" value="Alumni">
                    <label for="alumni">Alumni</label>
                </div>
                <div>
                    <input type="checkbox" name="event_scope[]" id="non-affiliate" value="Non-affiliate">
                    <label for="non-affiliate">Non-affiliate</label>
                </div>
                <div>
                    <input type="checkbox" name="event_scope[]" id="all" value="All">
                    <label for="all">All</label>
                </div>
            </div>
      
            <!--EVENT REGISTRATION DUE-->
            <label for="event_reg_duedate" class="form-label" style="font-weight: bold;">Registration Due</label>
            <div class="input-group">
                <input class="form-control" type="date" name="event_reg_duedate" id="event_reg_duedate" value="<?php echo $value['event_reg_duedate']; ?>" required>
            </div>



<div class="input-group">
    <input type="submit" id="submit" name="submit" value="Add Event" class="form-btn btn-primary">
    <input type="reset" id="btn-reset" name="btn-reset" hidden>
</div>
</form>
</div>
	
<?php
}
?>

