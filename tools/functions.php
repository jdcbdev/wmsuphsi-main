<?php

//VALIDATING MISVIS IMAGE
function validate_misvis_image($POST){
    if(!isset($POST['filename'])){
        return false;
    }else if(strlen(trim($POST['filename']))<1){
        return false;
    }
    return true;
}

//VALIDATING MISVIS TITLE
function validate_misvis_title($POST){
    if(!isset($POST['misvis_title'])){
        return false;
    }else if(strlen(trim($POST['misvis_title']))<1){
        return false;
    }
    return true;
}
//VALIDATING  MISVIS DESCRIPTION    
function validate_misvis_description($POST){
    if(!isset($POST['misvis_description'])){
        return false;
    }else if(strlen(trim($POST['misvis_description']))<1){
        return false;
    }
    return true;
}

function validate_misvis_title_duplicate($POST){
    if(!isset($POST['misvis_title'])){
        return false;
    }
    elseif(isset($POST['old_misvis_title'])){
        if(strcmp(strtolower($POST['misvis_title']), strtolower($POST['old_misvis_title'])) == 0){
            return true;
        }else{
            $misvis = new MisVis();
            foreach ($misvis->show() as $value){
                if(strcmp(strtolower($value['misvis_title']), strtolower($POST['misvis_title'])) == 0){
                    return false;
                }
            }
        }
    }else{
        $misvis = new MisVis();
        foreach ($misvis->show() as $value){
            if(strcmp(strtolower($value['misvis_title']), strtolower($POST['misvis_title'])) == 0){
                return false;
            }
        }
    }
    return true;
}



//VALIDATING ALL misvis FUNCTIONS
function validate_add_misvis($POST){
    if(!validate_misvis_image($POST) || !validate_misvis_title($POST) || !validate_misvis_description($POST) || !validate_misvis_title_duplicate($POST)){
        return false;
     }
    return true;
}

?>