<?php

    require_once '../classes/event_model.php';

    $delete_id = $_POST['delete_id'];

    $event = new Event();

    $delete = $event->deleteRecords($delete_id);

?>