
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
    <td><?php echo $i ?></td>
    <td><?php echo $value['event_title'] ?></td>
    <td><img src="../uploads/<?php echo $value['event_banner']; ?>"></td>
    <!--<td><?php echo $value['event_about'] ?></td>-->
    <!--<td><?php echo $value['event_mode'] ?></td>-->
    <td><?php echo $value['event_type'] ?></td>
    <!--<td><?php echo $value['event_location'] ?></td>-->
    <td><?php echo $value['event_date'] ?></td>
    <!--<td><?php echo $value['event_start_time'].' '.$value['event_end_time']  ?></td>-->
    <td><?php echo $value['event_slots'] ?></td>
    <!--<td><?php echo $value['event_scope'] ?></td>-->
    <!--<td><?php echo $value['event_platform'] ?></td>-->
    <!--<td><?php echo $value['event_reg_duedate'] ?></td>-->
    <td><?php echo $value['event_status'] ?></td>

    <td>
        <div class="action">
            <a class="action-edit" id="edit" value="<?php echo $value['id']; ?>">Edit</a>
            <a class="action-view" id="view" value="<?php echo $value['id']; ?>">View</a>
            <a class="action-delete" id="delete" value="<?php echo $value['id']; ?>">Delete</a>
        </div>
    </td>
</tr>
<?php
$i++;
//end of loop
}
?> 

<?php
    require_once '../includes/admin-footer.php';
?>