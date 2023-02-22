<?php

    require_once '../classes/events_model.php';

    $delete_id = $_POST['delete_id'];

    $events = new Events();

    $delete = $events->deleteRecords($delete_id);

?>