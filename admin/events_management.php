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
    $events_management = 'active';
    require_once '../includes/admin-header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>

<!--MISSION AND VISION START-->
<section>
    <div class="table-container" >
        <div class="table-heading" >
            <h3 class="table-title">Event</h3>
            <button class="button" id="add-new">Add New Event</button>
        </div>
        <table id="news-table" class="table display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Banner</th>
                    <!--<th>About</th>-->
                    <!--<th>Mode</th>-->
                    <th>Type</th>
                    <!--<th>Where</th>-->
                    <th>When</th>
                    <!--<th>From - To</th>-->
                    <!--<th>To</th>-->
                    <th>Slots</th>
                    <!--<th>Scope</th>-->
                    <!--<th>Platform</th>-->
                    <!--<th>Agenda</th>-->
                    <!--<th>End Registration</th>-->
                    <th>Status</th>
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

            <!--EVENT TITLEL-->
            <label for="event_title" class="form-label">Event Name</label>
            <div class="input-group">
                <input class="form-control" type="text" name="event_title" id="event_title" required>
            </div>
            
            <!--EVENT BANNER-->
            <label for="file">Upload Event Banner</label>
            <div class="preview">
                <img id="file-preview">
            </div>
            
            <!--EVENT BANNER UPLOAD BUTTON-->
            <div class="input-group">
                <input type="file" name="event_banner" id="event_banner" accept="image/*" onchange="showPreview(event)" required>
            </div>  

            <!--EVENT ABOUT-->
            <label for="event_about" class="form-label">About this Event</label>
            <div class="input-group">
                <textarea class="form-control" type="text" name="event_about" id="event_about" rows="4" cols="50" required> </textarea>
            </div>

            <!--EVENT MODE: ACTUAL OR VIRTUAL-->
            <label for="event_mode">Event Mode</label>
            <div class="input-group">
            <select id="event_mode" name="event_mode">
                <option value="">--Select Mode--</option>
                <option value="actual">On-site</option>
                <option value="virtual">Virtual</option>
            </select>
            </div> 

            <!--EVENT TYPE-->
            <label for="event_type" class="form-label">Event Type</label>
            <div class="input-group">
                <input class="form-control" type="text" name="event_type" id="event_type" required>
            </div>

            <!--EVENT LOCATION (VENUE)-->
            <label for="event_location" class="form-label">Where</label>
            <div class="input-group">
                <input class="form-control" type="text" name="event_location" id="event_location">
            </div>

            <!--WHEN IS THE EVENT (DATE)-->
            <label for="event_date" class="form-label">When</label>
            <div class="input-group">
                <input class="form-control" type="date" name="event_date" id="event_date" required>
            </div>

            <!--WHEN IS THE EVENT (START TIME)-->
            <label for="event_start_time" class="form-label">From</label>
            <div class="input-group">
                <input class="form-control" type="time" name="event_start_time" id="event_start_time" required>
            </div>

            <!--WHEN IS THE EVENT (END TIME)-->
            <label for="event_end_time" class="form-label">To</label>
            <div class="input-group">
                <input class="form-control" type="time" name="event_end_time" id="event_end_time" required>
            </div>

            <!--EVENT SLOTS (CAPACITY)-->
            <label for="event_slots" class="form-label">Slots</label>
            <div class="input-group">
                <input class="form-control" type="number" name="event_slots" id="event_slots" required>
            </div>

            <!--EVENT SCOPE-->
            <label for="event_scope" class="form-label">Scope</label>
            <div class="input-group">
                <input class="form-control" type="text" name="event_scope" id="event_scope"  required>
            </div>

            <!--EVENT ONLINE PLATFORM (LINK)-->
            <label for="event_platform" class="form-label">Online Platform (if event mode is virtual)</label>
            <div class="input-group">
                <input class="form-control" type="text" name="event_platform" id="event_platform">
            </div>
      

            <!--EVENT REGISTRATION DUE-->
            <label for="event_reg_duedate" class="form-label">Registration Due</label>
            <div class="input-group">
                <input class="form-control" type="datetime-local" name="event_reg_duedate" id="event_reg_duedate" required>
            </div>

            <!--EVENT STATUS-->
            <label for="event_status" class="form-label">Event Status</label>
             <div class="input-group">
                <select name="event_status" id="event_status" required>
                    <option value="Accepting">Accepting Attendees</option>
                    <option value="Close">Close Registration</option>
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
</div>
</section>
<!--MISSION AND VISION END-->













 <!-- Swiper Js link  -->
 <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Custom Js file link  -->
<script src="js/script.js"></script>    

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/events.js"></script>

<script>
  var eventModeSelect = document.getElementById("event_mode");
  var locationInput = document.getElementById("location_input");
  var platformInput = document.getElementById("platform_input");

  eventModeSelect.addEventListener("change", function() {
    if (eventModeSelect.value === "actual") {
      locationInput.style.display = "block";
      platformInput.style.display = "none";
    } else if (eventModeSelect.value === "virtual") {
      locationInput.style.display = "none";
      platformInput.style.display = "block";
    }
  });
</script>

       
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


    
