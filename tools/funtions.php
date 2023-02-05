<?php
//Validating Firstname in Sign Up Form
function validate_firstname($POST){
    if(!isset($POST['firstname'])){
        return false; //if firstname is empty, return false 
    }else if(strlen(trim($POST['firstname']))<1){
        return false; 
    }
    return true;
}

//Validating Middlename in Sign Up Form
function validate_middlename($POST){
    if(!isset($POST['middlename'])){
        return false; //if firstname is empty, return false 
    }else if(strlen(trim($POST['middlename']))<1){
        return false; 
    }
    return true;
}

//Validating Lastname in Sign Up Form
function validate_lastname($POST){
    if(!isset($POST['lastname'])){
        return false; //if firstname is empty, return false 
    }else if(strlen(trim($POST['lastname']))<1){
        return false; 
    }
    return true;
}

//Validating Email in Sign Up Form
function validate_email($POST){
    if(!isset($POST['email'])){
        return false; //if firstname is empty, return false 
    }else if(strlen(trim($POST['email']))<1){
        return false; 
    }
    return true;
}

//Validating Address in Sign Up Form
function validate_address($POST){
    if(!isset($POST['address'])){
        return false; //if firstname is empty, return false 
    }else if(strlen(trim($POST['address']))<1){
        return false; 
    }
    return true;
}

//Validating Gender in Sign Up Form
function validate_gender($POST){
    if(!isset($POST['gender'])){
        return false; //if firstname is empty, return false 
    }else if(strlen(trim($POST['gender']))<1){
        return false; 
    }
    return true;
}


//Validating Firstname in Sign Up Form
function validate_username($POST){
    if(!isset($POST['username'])){
        return false; //if firstname is empty, return false 
    }else if(strlen(trim($POST['password']))<1){
        return false; 
    }
    return true;
}

//Validating Password in Sign Up Form
function validate_password($POST){
    if(!isset($POST['password'])){
        return false; //if firstname is empty, return false 
    }else if(strlen(trim($POST['password']))<1){
        return false; 
    }
    return true;
}

//VALIDATING ALL SIGN UP FUNCTIONS
function validate_signup_form($POST){
    if(!validate_firstname($POST) || !validate_middlename($POST) || !validate_lastname($POST) || !validate_email($POST)
    || !validate_address($POST) || !validate_gender($POST) || !validate_username($POST) || !validate_password($POST)){
        return false;
     }
    return true;
}