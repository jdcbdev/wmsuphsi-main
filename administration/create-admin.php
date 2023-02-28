<?php

    require_once '../classes/administration_model.php';
    require_once '../tools/functions.php';

    $administration = new Administration();

    $create = $administration->insert();    


?>