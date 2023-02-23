<?php

    require_once '../classes/carousel_model.php';

    $delete_id = $_POST['delete_id'];

    $carousel = new Carousel();

    $delete = $carousel->deleteRecords($delete_id);

?>