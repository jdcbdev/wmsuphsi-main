<?php

    require_once '../classes/misvis_model.php';
    
    $edit_id = $_POST['edit_id'];
    
    $misvis = new Misvis();
    
    $update = $misvis->update($edit_id);


?>