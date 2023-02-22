<?php

    require_once '../classes/events_model.php';
    
    $edit_id = $_POST['edit_id'];
    
    $events = new Events();
    
    $update = $events->update($edit_id);


?>