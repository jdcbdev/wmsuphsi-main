<?php
//VALIDATING CAROUSEL TITLE
function validate_carousel_title($POST){
    if(!isset($POST['carousel_title'])){
        return false;
    }else if(strlen(trim($POST['carousel_title']))<1){
        return false;
    }
    return true;
}
//VALIDATING CAROUSEL DESCRIPTION    
function validate_carousel_description($POST){
    if(!isset($POST['carousel_description'])){
        return false;
    }else if(strlen(trim($POST['carousel_description']))<1){
        return false;
    }
    return true;
}
//VALIDATING ALL CAROUSEL FUNCTIONS
function validate_add_carousel($POST){
    if(!validate_carousel_title($POST) || !validate_carousel_description($POST)){
        return false;
     }
    return true;
}

?>