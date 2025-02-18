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
    require_once '../vendor/autoload.php';
    
    $config = HTMLPurifier_Config::createDefault();
    
    $config->set('Cache.DefinitionImpl', null);
    $config->set('HTML.AllowedElements', 'strong,em');
    $config->set('HTML.AllowedAttributes', []);
    
    $purifier = new HTMLPurifier($config);   

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

                        <li class="nav-item active" id="li-upcoming">
                            <a class="nav-link">Upcoming Events<!--<span class="counter" id="counter-all">3</span>--></a>
                        </li>

                        <li class="nav-item" id="li-all">
                            <a class="nav-link">All<!--<span class="counter" id="counter-all">3</span>--></a>
                        </li>

                        <li class="nav-item" id="add-account">
                            <a class="nav-link" id="add-new">Add New</a>
                        </li>
                    </ul>
                    <div class="table-responsive py-3 table-container">

                    </div>
        </main>
    </div>
</div>
<script>
        function load(status){
            if(status == 'upcoming'){
                $.ajax({
                    type: "GET",
                    url: 'upcoming.php',
                    success: function(result)
                    {
                        $('div.table-responsive').html(result);
                        dataTable = $("#table-upcoming").DataTable({
                            dom: 'Brtp',
                            responsive: true,
                            fixedHeader: true,
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: 'Excel',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'pdf',
                                    text: 'PDF',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'print',
                                    text: 'Print',
                                    className: 'border-white'
                                }
                            ],
                        });
                        dataTable.buttons().container().appendTo($('#MyButtons'));

                        $('input#keyword').on('input', function(e){
                            var status = $(this).val();
                            dataTable.columns([2]).search(status).draw();
                        });
                        $('select#event_organizer').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            } else if(status == 'all'){
                $.ajax({
                    type: "GET",
                    url: 'all.php',
                    success: function(result)
                    {
                        $('div.table-responsive').html(result);
                        dataTable = $("#table-all").DataTable({
                            dom: 'Brtp',
                            responsive: true,
                            fixedHeader: true,
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: 'Excel',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'pdf',
                                    text: 'PDF',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'print',
                                    text: 'Print',
                                    className: 'border-white'
                                }
                            ],
                        });
                        dataTable.buttons().container().appendTo($('#MyButtons'));

                        $('input#keyword').on('input', function(e){
                            var status = $(this).val();
                            dataTable.columns([2]).search(status).draw();
                        });
                        $('select#event_organizer').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            }
        }
        $(document).ready(function(){
            load('upcoming');
            $('ul.application .nav-item').on('click', function(){
                $('ul.application .nav-item').removeClass('active');
                $(this).addClass('active');
            });

            $('#li-upcoming').on('click', function(){
                load('upcoming');
            });

            $('#li-all').on('click', function(){
                load('all');
            });
        });
    </script>


<div id="edit-modal" class="modal"></div>

<div id="add-modal" class="admin-modal">
    <div class="admin-modal-content">
        <span class="close">&times;</span>
        <h3 class="admin-modal-title">Add New Event</h3>
        <hr>
        <form id="addform" class="form-class" method="post" enctype="multipart/form-data">
        
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
            <p style="font-size: 12px;color: red;font-style: italic;font-weight: lighter;">Max of 5mb. Accepted File Types: .jpg, .jpeg, .png</p>
                <input type="file" name="event_banner" id="event_banner" accept="image/*" onchange="showPreview(event)" required>
            </div>  

            <!--EVENT ABOUT-->
            <label for="event_about" class="form-label" style="font-weight: bold;">About this Event</label>
            <div class="input-group">
                <textarea style="height: 300px;width: 100%;" class="form-control" type="text" name="event_about" id="event_about" rows="4" cols="50" required> </textarea>
            </div>

            <label for="event_mode" style="font-weight: bold;">Event Mode</label>
            <div class="input-group">
                <select id="event_mode" name="event_mode" onchange="displayInputBox()">
                    <option value="">--Select Mode--</option>
                    <option value="On-site">On-site</option>
                    <option value="Virtual">Virtual</option>
                    <option value="Hybrid">Hybrid (On-site & Virutal Setup)</option>
                </select>
            </div>

            <div id="event_location_input" style="display:none;">
                <label for="event_location" class="form-label" style="font-weight: bold;">Location</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="event_location" id="event_location">
                </div>
            </div>

            <div id="event_platform_input" style="display:none;">
                <label for="event_platform" class="form-label" style="font-weight: bold;">Online Platform Link</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="event_platform" id="event_platform">
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
                    <label for="employee">Employee</label>
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
                    <input type="checkbox" name="event_scope[]" id="all" value="All" onchange="handleAllCheck()">
                    <label for="all">All</label>
                </div>
            </div>

            <script>
                function handleAllCheck() {
                        const allCheckbox = document.getElementById("all");
                        const otherCheckboxes = document.querySelectorAll('input[name="event_scope[]"]:not(#all)');

                        if (allCheckbox.checked) {
                            otherCheckboxes.forEach(checkbox => checkbox.checked = true);
                        } else {
                            otherCheckboxes.forEach(checkbox => checkbox.checked = false);
                        }
                }
            </script>

      

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
</div>
</section>

<script>
// Get the event date input element
const eventDateInput = document.getElementById('event_start_date');
// Get the registration due date input element
const regDueDateInput = document.getElementById('event_reg_duedate');

// Set the maximum value of the registration due date input to the event start date
regDueDateInput.max = eventDateInput.value;

// When the event date changes, update the minimum and maximum values of the registration due date input
eventDateInput.addEventListener('change', (event) => {
  // Get the value of the event date input
  const eventDate = new Date(event.target.value);
  // Set the minimum value of the registration due date input to the current date
  const currentDate = new Date();
  if (eventDate > currentDate) {
    regDueDateInput.min = currentDate.toISOString().slice(0, 10);
  } else {
    regDueDateInput.min = event.target.value;
  }
  // Set the maximum value of the registration due date input to the event date
  regDueDateInput.max = event.target.value;

  // If the current value of the registration due date input is after the event date or before the current date, reset it to the event date or current date respectively
  const regDueDate = new Date(regDueDateInput.value);
  if (regDueDate > eventDate || regDueDate < currentDate) {
    regDueDateInput.value = event.target.value;
  }
});

// When the registration due date changes, validate that it is not after the event date or before the current date
regDueDateInput.addEventListener('change', (event) => {
  // Get the value of the event date input
  const eventDate = new Date(eventDateInput.value);
  // Get the value of the registration due date input
  const regDueDate = new Date(event.target.value);
  // Get the current date
  const currentDate = new Date();

  // If the registration due date is after the event date or before the current date, show an error message and reset the input value
  if (regDueDate > eventDate || regDueDate < currentDate) {
    alert('Registration due date should be on or before the event start date and after or equal to the current date.');
    event.target.value = currentDate.toISOString().slice(0, 10);
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

</body>
</html>

