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
    $page_title = 'Events | WMSU - Peace and Human Security Institute';
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
                    <h5 class="col-12 fw-bold mb-3 mt-3 mt-md-0">Events</h5>
                    <ul class="nav nav-tabs application">

                        <li class="nav-item active" id="li-pending">
                            <a class="nav-link">Upcoming Events<span class="counter" id="counter-all">3</span></a>
                        </li>

                        <li class="nav-item" id="li-past">
                            <a class="nav-link">All<span class="counter" id="counter-all">3</span></a>
                        </li>

                        <li class="nav-item" id="add-account">
                            <a class="nav-link" id="add-new">Add New</a>
                        </li>
                    </ul>
                    <div class="table-responsive py-3 table-container">
                <table class="table table-hover col-12" id="table-pending" style="width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">Action</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Event Name</th>
                        <th scope="col">Event Organizer</th>
                        <th scope="col">Mode</th>
                        <th scope="col">Location</th>
                        <th scope="col">Link</th>
                        <th scope="col">Schedule</th>
                        <th scope="col">Scope</th>
                        <th scope="col">Slots</th>
                        <th scope="col">Registration Due Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
            <tbody id="fetch"></tbody>
            </table>
        </div>
        
        <div id="edit-modal" class="modal"></div>

<div id="add-modal" class="admin-modal">
    <div class="admin-modal-content">
        <span class="close">&times;</span>
        <h3 class="admin-modal-title">Add New Event</h3>
        <hr>
        <form id="addform" class="form-class" method="post" enctype="multipart/form-data">

            <!--EVENT ORGANIZER-->
            <label for="event_organizer" class="form-label" style="font-weight: bold;">Organizer</label>
            <div class="input-group" style="gap: 1rem;">
                <div>
                    <input type="checkbox" name="event_organizer[]" id="unesco" value="WMSU-PHSI">
                    <label for="unesco">WMSU-PHSI</label>
                </div>
                <div>
                    <input type="checkbox" name="event_organizer[]" id="phsi" value="WMSU UNESCO Club">
                    <label for="phsi">WMSU UNESCO Club</label>
                </div>
            </div>

            <!--EVENT TITLE-->
            <label for="event_title" class="form-label" style="font-weight: bold;">Event Name</label>
            <div class="input-group">
                <input class="form-control" type="text" name="event_title" id="event_title" required>
            </div>
            
            <!--EVENT BANNER-->
            <label for="file" style="font-weight: bold;">Upload Event Banner</label>
            <div class="preview">
                <img id="file-preview">
            </div>
            
            <!--EVENT BANNER UPLOAD BUTTON-->
            <div class="input-group">
                <input type="file" name="event_banner" id="event_banner" accept="image/*" onchange="showPreview(event)" required>
            </div>  

            <!--EVENT ABOUT-->
            <label for="event_about" class="form-label" style="font-weight: bold;">About this Event</label>
            <div class="input-group">
                <textarea class="form-control" type="text" name="event_about" id="event_about" rows="4" cols="50" required> </textarea>
            </div>

            <label for="event_mode" style="font-weight: bold;">Event Mode</label>
            <div class="input-group">
                <select id="event_mode" name="event_mode" onchange="displayInputBox()">
                    <option value="">--Select Mode--</option>
                    <option value="On-site">On-site</option>
                    <option value="Virtual">Virtual</option>
                </select>
            </div>

            <div id="event_platform_input" style="display:none;">
                <label for="event_platform" class="form-label" style="font-weight: bold;">Online Platform Link</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="event_platform" id="event_platform">
                </div>
            </div>

            <div id="event_location_input" style="display:none;">
                <label for="event_location" class="form-label" style="font-weight: bold;">Location</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="event_location" id="event_location">
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
                <input class="form-control" type="date" name="event_start_date" id="event_start_date" required>
            </div>
            <label for="event_end_date" class="form-label">To</label>
            <div class="input-group">
                <input class="form-control" type="date" name="event_end_date" id="event_end_date" required>
            </div>

            
            <label for="time" class="form-label" style="font-weight: bold;">Time</label>
            <label for="event_start_time" class="form-label">From</label>
            <div class="input-group">
                <input class="form-control" type="time" name="event_start_time" id="event_start_time" required>
            </div>
            <label for="event_end_time" class="form-label">To</label>
            <div class="input-group">
                <input class="form-control" type="time" name="event_end_time" id="event_end_time" required>
            </div>


            <!--EVENT SLOTS (CAPACITY)-->
            <label for="event_slots" class="form-label" style="font-weight: bold;">Slots</label>
            <div class="input-group">
                <input class="form-control" type="number" name="event_slots" id="event_slots" min="1"  required>
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
                <input class="form-control" type="date" name="event_reg_duedate" id="event_reg_duedate" required>
            </div>

            <div class="input-group">
                <input type="submit" id="submit" name="submit" value="Add Event" class="form-btn btn-primary">
                <input type="reset" id="btn-reset" name="btn-reset" hidden>
            </div>

        </form>

    </div>
</div>
</section>

<script>
  // Get the event date input element
  const eventDateInput = document.getElementById('event_start_date');
  // Get the registration due date input element
  const regDueDateInput = document.getElementById('event_reg_duedate');
  
  // When the event date changes, update the minimum value of the registration due date input
  eventDateInput.addEventListener('change', (event) => {
    // Get the value of the event date input
    const eventDate = new Date(event.target.value);
    // Set the minimum value of the registration due date input to the event date
    regDueDateInput.min < event.target.value;
    // If the current value of the registration due date input is after the event date, reset it to the event date
    if (new Date(regDueDateInput.value) => eventDate) {
      regDueDateInput.value < event.target.value;
    }
  });
  
  // When the registration due date changes, validate that it is not after the event date
  regDueDateInput.addEventListener('change', (event) => {
    // Get the value of the event date input
    const eventDate = new Date(eventDateInput.value);
    // Get the value of the registration due date input
    const regDueDate = new Date(event.target.value);
    // If the registration due date is after the event date, show an error message and reset the input value
    if (regDueDate => eventDate) {
      alert('Registration due date cannot be after event date.');
      event.target.value < eventDateInput.value;
    }
  });
</script>

<style>
    .form-label {
        display: block;
        margin-top: 1em;
    }

    .input-group {
        margin-bottom: 1em;
    }

    .preview {
        margin-bottom: 1em;
    }

    .preview img {
        max-width: 100%;
        max-height: 20em;
    }

    .submit-button {
        background-color: #4CAF50;
        color: white;
        padding: 0.5em 1em;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .submit-button:hover {
        background-color: #3e8e41;
    }

    .form-control {
        width: 100%;
        padding: 0.5em;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/events.js"></script>

<?php
    require_once '../includes/admin-footer.php';
?>





