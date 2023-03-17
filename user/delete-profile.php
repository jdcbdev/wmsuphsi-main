<?php

    require_once '../classes/user.class.php';

    $user_id = $_POST['user_id'];

    $user = new Users();

    $delete = $user->deleteRecords($delete_id);

?>