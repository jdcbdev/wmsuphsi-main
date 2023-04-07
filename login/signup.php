<?php
   require_once '../classes/user.class.php';
   require_once '../tools/functions.php';
    //resume session here to fetch session values
    session_start();
    $page_title = 'Sign Up | WMSU - Peace and Human Security Institute';
    require_once '../includes/signup-head.php';
?>


<?php 

if(isset($_POST['submit'])) {
  //Sanitizing the inputs of the users. Mandatory to prevent injections!

  $user = new Users;
  $user -> firstname = htmlentities($_POST['firstname']);
  $user -> middlename = htmlentities($_POST['middlename']);
  $user -> lastname = htmlentities($_POST['lastname']);
  $user -> suffix = htmlentities($_POST['suffix']);
  $user -> sex = htmlentities($_POST['sex']);
  $user -> email = htmlentities($_POST['email']);
  $user -> contact_number = htmlentities($_POST['contact_number']); 
  $user -> province = htmlentities($_POST['province']); 
  $user -> city = htmlentities($_POST['city']); 
  $user -> barangay = htmlentities($_POST['barangay']); 
  $user -> street_name = htmlentities($_POST['street_name']); 
  $user -> bldg_house_no = htmlentities($_POST['bldg_house_no']); 
  $user -> username = htmlentities($_POST['username']); 
  $user -> password = htmlentities($_POST['password']);
  $user -> member_type = is_array($_POST['member_type']) ? implode(',', $_POST['member_type']) : $_POST['member_type'];

  // Upload verification photos based on member type
  if (in_array('Student', $_POST['member_type'])) {
    $user -> verify_one = $_FILES['verify_one']['name'];
    $user -> tempname_one = $_FILES['verify_one']['tmp_name'];
    $user -> folder_one = "../uploads/" . $user -> verify_one;

    $user -> verify_two = $_FILES['verify_two']['name'];
    $user -> tempname_two = $_FILES['verify_two']['tmp_name'];
    $user -> folder_two = "../uploads/" . $user -> verify_two;
    
    if (empty($user -> verify_one) || empty($user -> verify_two)) {
      // Handle error: missing verification photo
    }
  }

  if (in_array('Alumni', $_POST['member_type'])) {
    $user -> verify_three = $_FILES['verify_three']['name'];
    $user -> tempname_three = $_FILES['verify_three']['tmp_name'];
    $user -> folder_three = "../uploads/" . $user -> verify_three;

    $user -> verify_four = $_FILES['verify_four']['name'];
    $user -> tempname_four = $_FILES['verify_four']['tmp_name'];
    $user -> folder_four = "../uploads/" . $user -> verify_four;

    if (empty($user -> verify_three) || empty($user -> verify_four)) {
      // Handle error: missing verification photo
    }
  }

  if (in_array('Employee', $_POST['member_type'])) {
    $user -> verify_five = $_FILES['verify_five']['name'];
    $user -> tempname_five = $_FILES['verify_five']['tmp_name'];
    $user -> folder_five = "../uploads/" . $user -> verify_five;

    $user -> verify_six = $_FILES['verify_six']['name'];
    $user -> tempname_six = $_FILES['verify_six']['tmp_name'];
    $user -> folder_six = "../uploads/" . $user -> verify_six;

    if (empty($user -> verify_five) || empty($user -> verify_six)) {
      // Handle error: missing verification photo
    }
  }

  if (in_array('None', $_POST['member_type'])) {
    $user -> verify_seven = $_FILES['verify_seven']['name'];
    $user -> tempname_seven = $_FILES['verify_seven']['tmp_name'];
    $user -> folder_seven = "../uploads/" . $user -> verify_seven;

    $user -> verify_eight = $_FILES['verify_eight']['name'];
    $user -> tempname_eight = $_FILES['verify_eight']['tmp_name'];
    $user -> folder_eight = "../uploads/" . $user -> verify_eight;

    if (empty($user -> verify_seven) || empty($user -> verify_eight)) {
      // Handle error: missing verification photo
    }
  }

  // Move uploaded files and validate/signup user
  if (
    (empty($user -> verify_one) || move_uploaded_file($user -> tempname_one, $user -> folder_one))
    && (empty($user -> verify_two) || move_uploaded_file($user -> tempname_two, $user -> folder_two))
    && (empty($user -> verify_three) || move_uploaded_file($user -> tempname_three, $user -> folder_three))
    && (empty($user -> verify_four) || move_uploaded_file($user -> tempname_four, $user -> folder_four))
    && (empty($user -> verify_five) || move_uploaded_file($user -> tempname_five, $user -> folder_five))
    && (empty($user -> verify_six) || move_uploaded_file($user -> tempname_six, $user -> folder_six))
    && (empty($user -> verify_seven) || move_uploaded_file($user -> tempname_seven, $user -> folder_seven))
    && (empty($user -> verify_eight) || move_uploaded_file($user -> tempname_eight, $user -> folder_eight))
  ) {
    if(validate_signup_user($_POST)){
      if($user -> signup()){
        //redirect user to signup

                    //redirect user to signup page after saving
                    header('location: login.php');
                }
            }
              
          }
      }
?>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <div class="logo-details">
            <img src="../images/logos/phsi.png"  alt="PHSI-LOGO" style="width: 20%;margin: auto;">
            </div>
                <h2 id="heading">Sign Up Your User Account</h2>
                <p>Fill all form field to go to next step</p>

                <form id="msform" action="signup.php" method="post" enctype="multipart/form-data">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li id="personal" class="active" ><strong>Personal</strong></li>
                        <li id="payment"><strong>Upload</strong></li>
                        <li id="account"><strong >Account</strong></li>
                        <li id="confirm"><strong>Verify</strong></li>
                    </ul>
                    <div class="progress">
                    	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                	</div>
                    <br>

                    <!--STEP1: PERSONAL INFORMATION -->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                        		<div class="col-7">
                            		<h2 class="fs-title" style="color: #107869;">Personal Information:</h2>
                            	</div>
                            	<div class="col-5">
                            		<h2 class="steps">Step 1 - 4</h2>
                            	</div>
                            </div>
                            <label class="fieldlabels details">First Name:</label>
                            <input type="text" name="firstname" required/>
       

                            <label class="fieldlabels">Middle Name: </label>
                            <input type="text" name="middlename"/>

                            <label class="fieldlabels details">Last Name:</label>
                            <input type="text" name="lastname" required/>
       

                            <label class="fieldlabels">Suffix: </label>
                            <input type="text" name="suffix"/>

                            <label class="fieldlabels details">Sex: </label>
                            <select name="sex" id="sex" style="padding: 12px;" required>
                              <option value="">--Select Sex--</option>
                              <option value="Male" >Male</option>
                              <option value="Female">Female</option>
                            </select>
          
       

                            <label class="fieldlabels details"> Contact No.:</label>
                            <input type="text" id="contact_number" name="contact_number"required/>
       

                            <label class="fieldlabels details">Province: </label>
                            <select name="province" id="province" style="padding: 12px;" required>
                              <option value="">--Select Province--</option>
                              <option value="City of Isabela">City of Isabela</option>
                              <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                              <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                              <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                            </select>
       

                            <label class="fieldlabels details">City/Municipality: </label>
                            <select name="city" id="city" style="padding: 12px;" disabled required>
                              <option value="">--Select City/Municipality--</option>
                            </select>
       

                            <label class="fieldlabels details">Barangay: </label>
                            <select name="barangay" id="barangay" style="padding: 12px;" disabled required>
                               <option value="">--Select Barangay--</option>
                            </select>
                            
                            <label class="fieldlabels">Street Name:</label>
                            <input type="text" name="street_name" placeholder=""/>

                            <label class="fieldlabels">Building/House No.:</label>
                            <input type="text" name="bldg_house_no" placeholder=""/>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" style="margin-top: 3rem;"/>
                    </fieldset>

                    <!--STEP2: USER TYPE UPLOAD ID FOR VALIDATION-->
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                        		<div class="col-7">
                            		<h2 class="fs-title" style="color: #107869;">Upload Requirements:</h2>
                            	</div>
                            	<div class="col-5">
                            		<h2 class="steps">Step 2 - 4</h2>
                            	</div>
                            </div>

                            <style>
                            .checkbox-container {
                                display: flex;
                                flex-direction: row;
                                align-items: center;
                            }
                            .checkbox-container label {
                                margin-right: 20px;
                                margin-bottom: 12px;
                            }

                            .id-upload {
                            display: none; /* hide the ID upload fields by default */
                            }
                            </style>

                            <label for="member_type">Select all status that applies to you:</label>
                            <div class="checkbox-container">
                            <input type="checkbox" id="student" name="member_type[]" value="Student" class="member-type">
                            <label for="student">Student</label>
                            <input type="checkbox" id="alumni" name="member_type[]" value="Alumni" class="member-type">
                            <label for="alumni">Alumni</label>
                            <input type="checkbox" id="employee" name="member_type[]" value="Employee" class="member-type">
                            <label for="employee">Employee</label>
                            <input type="checkbox" id="none" name="member_type[]" value="None" class="member-type">
                            <label for="none">None</label>
                            </div>
                             
                            <hr>
                               

                            <div class="id-upload Student">
                            <label class="fieldlabels">Upload Your Student ID (Front):</label>
                            <div class="input-group">
                                <input type="file" name="verify_one" id="verify_one" accept="image/*" onchange="showDisplayOne(event)"  >
                            </div>
                            <label for="file"></label>
                            <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);">
                                <img id="preview-one">
                            </div>
                            
                            <label class="fieldlabels">Upload Your Student ID (Back):</label>
                            <div class="input-group">
                                <input type="file" name="verify_two" id="verify_two" accept="image/*" onchange="showDisplayTwo(event)" >
                            </div>
                            <label for="file"></label>
                            <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12); margin-bottom: 2rem;">
                                <img id="preview-two">
                            </div>
                            </div>

        

                            <div class="id-upload Alumni">
                            <label class="fieldlabels">Upload Your Alumni ID (Front):</label>
                            <div class="input-group">
                                <input type="file" name="verify_three" id="verify_three" accept="image/*" onchange="showDisplayThree(event)"  >
                            </div>
                            <label for="file"></label>
                            <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);">
                                <img id="preview-three">
                            </div>

                            <label class="fieldlabels">Upload Your Alumni ID (Back):</label>
                            <div class="input-group">
                                <input type="file" name="verify_four" id="verify_four" accept="image/*" onchange="showDisplayFour(event)" >
                            </div>
                            <label for="file"></label>
                            <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12); margin-bottom: 2rem;">
                                <img id="preview-four">
                            </div>
                            </div>

                            
                            

                            <div class="id-upload Employee">
                            <label class="fieldlabels">Upload Your Employee ID (Front):</label>
                            <div class="input-group">
                                <input type="file" name="verify_five" id="verify_five" accept="image/*" onchange="showDisplayFive(event)" >
                            </div>
                            <label for="file"></label>
                            <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);">
                                <img id="preview-five">
                            </div>
                            
                            <label class="fieldlabels">Upload Your Employee ID (Back):</label>
                            <div class="input-group">
                                <input type="file" name="verify_six" id="verify_six" accept="image/*" onchange="showDisplaySix(event)" >
                            </div>
                            <label for="file"></label>
                            <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12); margin-bottom: 2rem;">
                                <img id="preview-six">
                            </div>
                            </div>

                            <div class="id-upload None">
                            <label class="fieldlabels">Upload National ID (Front):</label>
                            <div class="input-group">
                                <input type="file" name="verify_seven" id="verify_seven" accept="image/*" onchange="showDisplaySeven(event)" >
                            </div>
                            <label for="file"></label>
                            <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);">
                                <img id="preview-seven">
                            </div>

                            <label class="fieldlabels">Upload National ID (Back):</label>
                            <div class="input-group">
                                <input type="file" name="verify_eight" id="verify_eight" accept="image/*" onchange="showDisplayEight(event)" >
                            </div>
                            <label for="file"></label>
                            <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12); margin-bottom: 2rem;">
                                <img id="preview-eight">
                            </div>
                            </div>

                            <script>
                            // select all the member type checkboxes
                            const memberTypeCheckboxes = document.querySelectorAll('.member-type');

                            // add an event listener to each checkbox
                            memberTypeCheckboxes.forEach(checkbox => {
                                checkbox.addEventListener('change', () => {
                                    // get the value of the checkbox that was clicked
                                    const checkboxValue = checkbox.value;

                                    // select the ID upload field container that corresponds to the clicked checkbox
                                    const idUploadFieldContainer = document.querySelector(`.id-upload.${checkboxValue}`);

                                    // show or hide the ID upload field container based on whether the checkbox is checked
                                    if (checkbox.checked) {
                                        idUploadFieldContainer.style.display = 'block';
                                    } else {
                                        idUploadFieldContainer.style.display = 'none';
                                    }

                                    // reset the file inputs in the ID upload field container
                                    const fileInputs = idUploadFieldContainer.querySelectorAll('input[type=file]');
                                    fileInputs.forEach(input => {
                                        input.value = '';
                                    });

                                    // reset the preview images in the ID upload field container
                                    const previewImages = idUploadFieldContainer.querySelectorAll('.preview img');
                                    previewImages.forEach(img => {
                                        img.src = '';
                                    });
                                });
                            });
                            </script>

                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    </fieldset>

                    <!--STEP3: ACCOUNT INFORMATION-->
                    <fieldset>
                        <div class="form-card">
                        	<div class="row">
                        		<div class="col-7">
                            		<h2 class="fs-title" style="color: #107869;">Account Information:</h2>
                            	</div>
                            	<div class="col-5">
                            		<h2 class="steps">Step 3 - 4</h2>
                            	</div>
                            </div>
                            <label class="fieldlabels details ">Username:</label>
                            <input type="text" name="username" placeholder="" required/>

                            <label class="fieldlabels details">Email: </label>
                            <input type="email" name="email" required/>

                            <label class="fieldlabels details">Password:</label>
                            <span id="password-strength"></span>
                            <input type="password" id="password" name="password" maxlength="12" placeholder="">
                            

                            <label class="fieldlabels details">Confirm Password:</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="" maxlength="12" required/>
                        </div>
                        <input type="submit" name="submit" class="submit action-button" value="Submit" style="margin-top: 3rem;"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" style="margin-top: 3rem;"/>
                    </fieldset>

                    <!--STEP4:EMAIL ACCOUNT VERIFICATION -->
                    <fieldset>
                        <div class="form-card">
                        	<div class="row">
                        		<div class="col-7">
                            		<h2 class="fs-title" style="color: #107869;">Email Verication:</h2>
                            	</div>
                            	<div class="col-5">
                            		<h2 class="steps">Step 4 - 4</h2>
                            	</div>
                            </div>
                            <br><br>
                            <h2 class="purple-text text-center"><strong>ALMOST THERE!</strong></h2>
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="../images/logos/phsi.png" class="fit-image">
                                </div>
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center" style="color: black;">
                                      Thank you for signing up! We've sent a verification email to <span style="color= #107869;">arjay.malaga990@gmail.com</spam> 
                                      Please click the link in the email to activate your account.</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                </form>


    <script>
        $(document).ready(function(){
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;
            setProgressBar(current);
            
            $(".next").click(function(){
                if(validateForm(current)){ // check if all required fields are filled before going to the next step
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    //show the next fieldset
                    next_fs.show(); 
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                        }, 
                        duration: 500
                    });
                    setProgressBar(++current);
                }
            });

            $(".previous").click(function(){
                
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                
                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                
                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    }, 
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep){
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                .css("width",percent+"%")   
            }

            $(".submit").click(function() {
                if(validateForm(current)){ // check if all required fields are filled before submitting the form data
                    // serialize form data
                    var form_data = $("#msform").serialize();
                    
                    // send AJAX request to the server
                    $.ajax({
                        url: "signup.php",
                        type: "POST",
                        data: form_data,
                        success: function(res) {
                            console.table(res);
                            // handle response from the server
                            if (res.success) {
                                // redirect to the success page
                                window.location.href = "success.html";
                            } else {
                                // display error message
                                $("#input-error").html(res.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });

            function validateForm(step) {
                var valid = true;
                $("fieldset:eq(" + (step - 1) + ")").find("input[required], select[required]").each(function() {
                    if($.trim($(this).val()) == '') {
                        valid = false;
                        $(this).addClass('input-error');
                        $(this).css('border-color', 'red');
                    }
                    else {
                        $(this).removeClass('input-error');
                        $(this).css('border-color', '');
                    }
                });
                return valid;
            }
        });
</script>



            </div>
        </div>
	</div>
</div>

<style>
#heading {
	text-transform: uppercase;
	color: #107869;
	font-weight: normal;
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;

    /*stacking fieldsets above each other*/
    position: relative;
}

.form-card {
	text-align: left;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

#msform input, #msform textarea, #msform select {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: none;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px;
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #107869;
    outline-width: 0;
}

/*Next Buttons*/
#msform .action-button {
    width: 100px;
    background: #107869;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right;
}

#msform .action-button:hover, #msform .action-button:focus {
    background-color: #0eb582;
}

/*Previous Buttons*/
#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    background-color: #000000;
}

/*The background card*/
.card {
    z-index: 0;
    border: none;
    position: relative;
}

/*FieldSet headings*/
.fs-title {
    font-size: 18px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left;
}

.purple-text {
	color: #107869;
    font-weight: normal;
}

/*Step Count*/
.steps {
	font-size: 18px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right;
}

/*Field names*/
.fieldlabels {
	color: gray;
	text-align: left;
}

.details::after {
  content: " *";
  color: red;
}

/*Icon progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
}

#progressbar .active {
    color: #107869;
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
}

/*Icons in the ProgressBar*/
#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e";
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007";
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f016";
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c";
}

/*Icon ProgressBar before any progress*/
#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
}

/*ProgressBar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1;
}

/*Color number of the step and the connector before it*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #107869;
}

/*Animated Progress Bar*/
.progress {
	height: 20px;
}

.progress-bar {
	background-color: #107869;
}

/*Fit image in bootstrap div*/
.fit-image{
    width: 100%;
    object-fit: cover;
}



</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/signup.js"></script>
<script src="../js/address.js"></script>
<!--<script src="../multiform.js"></script>-->




