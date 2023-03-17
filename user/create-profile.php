<?php

    require_once '../classes/user.class.php';
    require_once '../tools/functions.php';

    $user = new Users();

    $create = $user->insert();    


?>