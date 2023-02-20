<?php

    require_once '../classes/history_model.php';
    
    $edit_id = $_POST['edit_id'];
    
    $history = new History();
    
    $update = $history->update($edit_id);


?>