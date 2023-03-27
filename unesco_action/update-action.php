<?php

require_once '../classes/unesco_action_model.php';
    
    $edit_id = $_POST['edit_id'];
    
    $action= new Action();
    
    $update = $action->update($edit_id);


?>