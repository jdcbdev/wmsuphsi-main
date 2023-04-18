<?php require_once 'filter.php'; ?>
<table class="table table-hover col-12" id="table-attended" style="width: 100%;">
    <thead>
        <tr>
            <!--<th scope="col">#</th>-->
            <th scope="col">Action</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Organization</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    require_once '../classes/rsvp_model.php';
    
    $rsvp = new Rsvp();
    $rsvp -> event_id = $_GET['id'];
    $listOfAttendees = $rsvp -> fetchAttendee();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($listOfAttendees as $value){ 
        //start of loop
    ?>
            <tr>
            <!--<th scope="row">1</th>-->
            <td>
                <div class="action-button">
                    <a name="confirm_attendance" type="submit" class="me-2 green" id="confirm_attendance" value="#"><i class='bx bxs-hand'></i> Confirm Attendance</a>
                </div>
            </td>
            <td><?php echo $value['firstname'].' '.$value['middlename'].' '.$value['lastname'].' '.$value['suffix'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><span class="type-Student">Student</span></td>
            <td><span class="org-unesco">WMSU UNESCO Club</span></td>
            <td><?php echo $value['contact_number'] ?></td>
            <td>Guiwan, Zamboanga City</td>
        </tr>
        <?php
        $i++;
        //end of loop
    } 
?> 

    </tbody>
</table>    