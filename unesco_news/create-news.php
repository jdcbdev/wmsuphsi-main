<?php

    require_once '../classes/unesco_action_model.php';
    require_once '../tools/functions.php';

    $news = new News();

    $create = $news->insert();    


?>