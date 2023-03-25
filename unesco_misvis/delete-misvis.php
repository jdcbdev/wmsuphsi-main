<?php

    require_once '../classes/misvis_model.php';

    $delete_id = $_POST['delete_id'];

    $misvis = new Misvis();

    $delete = $misvis->deleteRecords($delete_id);

?>