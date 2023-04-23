<?php 
require_once '../classes/rsvp_model.php';

if(isset($_POST['confirm_attendance'])) {
    $rsvp = new Rsvp();
    $email = $_POST['confirm_attendance'];
    $event_id = $_GET['id'];
    if($rsvp->confirm_attendance($email, $event_id)) {
        echo "Attendance confirmed!";
    } else {
        echo "Failed to confirm attendance!";
    }
    exit; //stop executing the script after confirming attendance
}

require_once 'filter.php';
?>

<table class="table table-hover col-12" id="table-confirm" style="width: 100%;">
    <thead>
        <tr>
            <!--<th scope="col">#</th>-->
            <th scope="col">Action</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['id'])) {
            $rsvp = new Rsvp();
            $rsvp->event_id = $_GET['id'];
            $listOfAttendees = $rsvp->getConfirm($rsvp->event_id);
            //We will now fetch all the records in the array using loop
            //use as a counter, not required but suggested for the table
            $i = 1;
            //loop for each record found in the array
            foreach ($listOfAttendees as $value){ 
                //start of loop
        ?>
        <tr>
            <td>
                <div class="action-button">
                <button class="me-2 green confirm-button" data-email="<?php echo $value['email']; ?>"><i class='bx bxs-hand'></i> Confirm Attendance</button>
                </div>
            </td>
            <td><?php echo $value['firstname'].' '.$value['middlename'].' '.$value['lastname'].' '.$value['suffix'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><span class="type-Student"><?php echo $value['member_type']?></span></td>
            <td><?php echo $value['contact_number'] ?></td>
            <td><?php echo $value['barangay'].', '.$value['city']?></td>
        </tr>
        <?php $i++; } } ?> 
    </tbody>
</table>

<script>
    // Use jQuery to bind click event to confirm attendance button
    $('.confirm-button').on('click', function(e) {
        e.preventDefault(); // prevent default form submission behavior
        var email = $(this).data('email');
        var eventId = <?php echo $_GET['id']; ?>; // get the event id from the URL
        
        $.ajax({
            url: 'confirm.php?id=' + eventId, // set the URL to the current page with the event ID in the query string
            method: 'POST',
            data: {
                confirm_attendance: email
            },
            success: function(response) {
                alert(response); // show a message indicating the attendance has been confirmed
                $(e.target).closest('tr').remove(); // remove the row from the table
            },
            error: function() {
                alert('Failed to confirm attendance.'); // show an error message if the attendance confirmation fails
            }
        });
    });
</script>
