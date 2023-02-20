
<?php
    
    require_once '../classes/misvis_model.php';
    
    $misvis = new Misvis();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($misvis->fetchAllRecords() as $value){ 
        //start of loop
    ?>
    
    <tr>
    <!-- always use echo to output PHP values -->
    <td><?php echo $i ?></td>
    <td><img src="../uploads/<?php echo $value['filename']; ?>" alt="<?php echo $value['misvis_title']; ?>"></td>
    <td><?php echo $value['misvis_title'] ?></td>
    <td><?php echo $value['misvis_description'] ?></td>
    <td>
        <div class="action">
            <a class="action-edit" id="edit" value="<?php echo $value['id']; ?>">Edit</a>
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