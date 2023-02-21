<?php

    require_once '../classes/news_model.php';
    require_once '../tools/functions.php';

    $news = new News();

    $create = $news->insert();    


?>