<?php

    require_once '../classes/event_model.php';
    
    $edit_id = $_POST['edit_id'];
    
    $event = new Event();
    
    $update = $event->update($edit_id);


?>