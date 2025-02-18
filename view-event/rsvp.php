<?php 
    require_once 'filter.php'; 

?>
<table class="table table-hover col-12" id="table-rsvp" style="width: 100%;">
<thead>
    <tr>
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
        require_once '../classes/rsvp_model.php';
        $rsvp = new Rsvp();
        $rsvp->event_id = $_GET['id'];
        $listOfAttendees = $rsvp->getRsvp($rsvp->event_id);
        //We will now fetch all the records in the array using loop
        //use as a counter, not required but suggested for the table
        $i = 1;
        //loop for each record found in the array
        foreach ($listOfAttendees as $value){ 
            //start of loop
    ?>
    <tr>
        <td><?php echo $value['firstname'].' '.$value['middlename'].' '.$value['lastname'].' '.$value['suffix'] ?></td>
        <td><?php echo $value['email'] ?></td>
        <td><span class="type-Student"><?php echo $value['member_type']?></span></td>
        <td><?php echo $value['contact_number'] ?></td>
        <td><?php echo $value['barangay'].', '.$value['city']?></td>
    </tr>
    <!--End of loop-->
    <?php $i++; } } ?> 
    
</tbody>
</table>    