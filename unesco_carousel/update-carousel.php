<?php

    require_once '../classes/unesco_carousel_model.php';    
    $edit_id = $_POST['edit_id'];
    
    $carousel = new Carousel();
    
    $update = $carousel->update($edit_id);


?>