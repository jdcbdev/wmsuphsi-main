<?php

    require_once '../classes/events_model.php';
    require_once '../tools/functions.php';

    $events = new Events();

    $create = $events->insert();    


?>