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

<!--EVENT TITLEL-->
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
<label for="event_mode">Event Mode</label>
<div class="input-group">
<select id="event_mode" name="event_mode" value="<?php echo $value['event_mode']; ?>">
    <option value="none">--Select Mode--</option>
    <option value="Actual">On-site</option>
    <option value="Virtual">Virtual</option>
</select>
</div> 

<!--EVENT TYPE-->
<label for="event_type" class="form-label">Event Type</label>
<div class="input-group">
    <input class="form-control" type="text" name="event_type" id="event_type" value="<?php echo $value['event_type']; ?>" required>
</div>

<!--EVENT LOCATION (VENUE)-->
<label for="event_location" class="form-label">Where</label>
<div class="input-group">
    <input class="form-control" type="text" name="event_location" id="event_location" value="<?php echo $value['event_location']; ?>">
</div>

<!--WHEN IS THE EVENT (DATE)-->
<label for="event_date" class="form-label">When</label>
<div class="input-group">
    <input class="form-control" type="date" name="event_date" id="event_date" value="<?php echo $value['event_date']; ?>" required>
</div>

<!--WHEN IS THE EVENT (START TIME)-->
<label for="event_start_time" class="form-label">From</label>
<div class="input-group">
    <input class="form-control" type="time" name="event_start_time" id="event_start_time" value="<?php echo $value['event_start_time']; ?>" required>
</div>

<!--WHEN IS THE EVENT (END TIME)-->
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
<label for="event_scope" class="form-label">Scope</label>
<div class="input-group">
    <input class="form-control" type="text" name="event_scope" id="event_scope" value="<?php echo $value['event_scope']; ?>"  required>
</div>

<!--EVENT ONLINE PLATFORM (LINK)-->
<label for="event_platform" class="form-label">Online Platform (if event mode is virtual)</label>
<div class="input-group">
    <input class="form-control" type="text" name="event_platform" id="event_platform" value="<?php echo $value['event_platform']; ?>" >
</div>


<!--EVENT REGISTRATION DUE-->
<label for="event_reg_duedate" class="form-label">Registration Due</label>
<div class="input-group">
    <input class="form-control" type="datetime-local" name="event_reg_duedate" id="event_reg_duedate" value="<?php echo $value['event_reg_duedate']; ?>" required>
</div>

<!--EVENT STATUS-->
<label for="event_status" class="form-label">Event Status</label>
 <div class="input-group">
    <select name="event_status" id="event_status" value="<?php echo $value['event_status']; ?>" required>
        <option value="Accepting">Accepting Attendees</option>
        <option value="Close">Registration is Close</option>
        <option value="Ongoing">Ongoing</option>
        <option value="Postponed">Postponed</option>
        <option value="Cancelled">Cancel</option>
        <option value="Ended">Ended</option>
    </select>
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