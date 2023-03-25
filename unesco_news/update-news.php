<?php

    require_once '../classes/news_model.php';
    
    $edit_id = $_POST['edit_id'];
    
    $news= new News();
    
    $update = $news->update($edit_id);


?>