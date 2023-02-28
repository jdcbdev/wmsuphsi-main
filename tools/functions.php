<?php
function validate_firstname($POST){
    if(!isset($POST['firstname'])){
        return false;
    }else if(strlen(trim($POST['firstname']))<1){
        return false;
    }
    return true;
}


/*function validate_middlename($POST){
    if(!isset($POST['middlename'])){
        return false;
    }else if(strlen(trim($POST['middlename']))<1){
        return false;   
    }
    return true;
}*/

function validate_lastname($POST){
    if(!isset($POST['lastname'])){
        return false;
    }else if(strlen(trim($POST['lastname']))<1){
        return false;
    }
    return true;
}

/*function validate_suffix($POST){
    if(!isset($POST['suffix'])){
        return false;
    }else if(strlen(trim($POST['suffix']))<1){
        return false;
    }
    return true;
}*/


function validate_email($POST){
    // Remove all illegal characters from email
    $email = filter_var($POST['email'], FILTER_SANITIZE_EMAIL);
    //validate email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        // separate string by @ characters (there should be only one )
        $parts = explode('@', $email);

        // remove and return last part, which should be the domain 
        $domain = array_pop($parts);

       
    }else {
        return false;
    }
    return true;
}


/*function contactno($POST){
    if(preg_match('/^[0-9]{11}+$/', $contact_number)) {
        echo "Valid Phone Number";
        } else {
        echo "Invalid Phone Number";
        }
}*/

//VALIDATING ALL misvis FUNCTIONS
function validate_signup_user($POST){
    if(!validate_firstname($POST) || !validate_lastname($POST) || !validate_email($POST)){
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
    if(!validate_misvis_title($POST) || !validate_misvis_description($POST) || !validate_misvis_title_duplicate($POST)){
        return false;
     }
    return true;
}

?>