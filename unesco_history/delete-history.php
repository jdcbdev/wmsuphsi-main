<?php

    require_once '../classes/history_model.php';

    $delete_id = $_POST['delete_id'];

    $history = new History();

    $delete = $history->deleteRecords($delete_id);

?>