<?php

    require_once '../classes/news_model.php';

    $delete_id = $_POST['delete_id'];

    $news = new News();

    $delete = $news->deleteRecords($delete_id);

?>