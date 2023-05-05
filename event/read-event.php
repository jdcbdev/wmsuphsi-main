<?php
    require_once '../classes/event_model.php';
    
    $event = new Event();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($event->fetchAllRecords() as $value){ 
        //start of loop
    ?>
    <tr>
        <!-- always use echo to output PHP values -->
        <td>
            <div class="action-button">
                <a title="Attendee" href="../view-event?id=<?php echo $value['id']; ?>" class="me-2 green" id="rsvp"><i class="fa-solid fa-user-group"></i></a>
                <a title="View" href="../event/events-page.php?id=<?php echo $value['id']; ?>" class="me-2 green" id="view"><i class="fa-solid fa-eye"></i></a>
                <a title="Edit" href="#" class="me-2 green" id="edit" value="<?php echo $value['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a title="Delete" href="#" class="green" id="delete" value="<?php echo $value['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
            </div>
        </td>
        <td style="width: 50%;"><img src="../uploads/<?php echo $value['event_banner']; ?> " style="width: 20%;"></td>
        <td><?php echo $value['event_title'] ?></td>
        <td><?php echo $value['event_mode'] ?></td>
        <td><?php echo $value['event_location'] ?></td>
        <td><?php echo $value['event_platform'] ?></td>
        <td><?php echo $value['event_start_date'].' - '.$value['event_end_date']  ?></td>
        <td><?php echo $value['event_scope'] ?></td>
        <td><?php echo $value['event_slots'] ?></td>
        <td><?php echo $value['event_reg_duedate'] ?></td>    
    </tr> 
    <!--End of loop-->
<?php $i++; } ?> 
