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
                        <th scope="col">Event Name</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Mode</th>
                        <th scope="col">When</th>
                        <th scope="col">Slots</th>
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
                <option value="Actual">On-site</option>
                <option value="Virtual">Virtual</option>
            </select>
            </div> 


            <!--EVENT TYPE-->
            <label for="event_type" class="form-label">Event Type</label>
            <div class="input-group">
                <select id="event_type" name="event_type" onchange="showHideOtherInput()">
                <option value="">--Select Type--</option>
                <option value="Type 1">Type 1</option>
                <option value="Type 2">Type 2</option>
                <option value="Type 3">Type 3</option>
                <option value="Other">Other</option>
                </select>
                <input class="form-control" type="text" name="event_type_other" id="event_type_other" style="display: none;">
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

<script>
    function showHidePlatformInput(){
    var mode = document.getElementById("event_mode").value;
    var platformInput = document.getElementById("event_platform");
    var platformLabel = document.querySelector("label[for='event_platform']");

    if(mode === "Virtual"){
      platformInput.style.display = "block";
      platformLabel.style.display = "block";
    } else {
      platformInput.style.display = "none";
      platformLabel.style.display = "none";
    }
  }

  function showHideOtherInput(){
    var type = document.getElementById("event_type").value;
    var otherInput = document.getElementById("event_type_other");

    if(type === "Other"){
      otherInput.style.display = "block";
    } else {
      otherInput.style.display = "none";
    }
  }
</script>
    </div>
</div>
</section>
<!--MISSION AND VISION END-->


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


    
