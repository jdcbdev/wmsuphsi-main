<?php

    require_once '../classes/unesco_administration_model.php';
    
    $edit_id = $_POST['edit_id'];
    
    $administration= new Administration();
    
    $update = $administration->update($edit_id);


?>