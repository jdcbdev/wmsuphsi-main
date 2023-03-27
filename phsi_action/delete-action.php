<?php

require_once '../classes/phsi_action_model.php';

    $delete_id = $_POST['delete_id'];

    $action = new Action();

    $delete = $action->deleteRecords($delete_id);

?>