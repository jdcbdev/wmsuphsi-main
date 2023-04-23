
function showPw(){
    let input = document.getElementById("password");
    if(input.type == "password"){
        input.type = "text";
    } else {
        input.type = "password";
    }
}

const numberInput = document.getElementById("contact_number");
numberInput.addEventListener("blur", function(event) {
  // Remove non-numeric characters
  let newValue = event.target.value.replace(/[^0-9]/g, '');

  // Display pop-up message if input is not exactly 11 digits long
  if (newValue.length !== 11) {
    alert("Please enter 11 digits for your contact number.");
    // Set focus back to input field
    event.target.focus();
  } else {
    // Assign cleaned input value to input field
    event.target.value = newValue;
  }
});




//Modal Functions
$(document).on('click', 'span.close', function(e){
    $('#edit-modal').css('display', 'none');
    $("#add-modal").css('display', 'none');
});

function showDisplayOne(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        $("#preview-one").attr('src', src);
    }
}

function showDisplayTwo(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        $("#preview-two").attr('src', src);
    }
}

function showDisplayThree(event){
  if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      $("#preview-three").attr('src', src);
  }
}

function showDisplayFour(event){
  if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      $("#preview-four").attr('src', src);
  }
}

function showDisplayFive(event){
  if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      $("#preview-five").attr('src', src);
  }
}


function showDisplaySix(event){
  if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      $("#preview-six").attr('src', src);
  }
}


function showDisplaySeven(event){
  if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      $("#preview-seven").attr('src', src);
  }
}


function showDisplayEight(event){
  if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      $("#preview-eight").attr('src', src);
  }
}





$(document).on('click', '#add-new', function(e){
    $('#add-modal').css('display', 'block');
});


const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm_password");

// Add input event listeners to both password fields
passwordInput.addEventListener("input", validatePassword);
confirmPasswordInput.addEventListener("input", validatePassword);

function validatePassword() {
  if (passwordInput.value !== confirmPasswordInput.value) {
    confirmPasswordInput.setCustomValidity("Passwords do not match");
  } else {
    confirmPasswordInput.setCustomValidity("");
  }
}

var password_Input = document.getElementById("password-input");
var passwordStrength = document.getElementById("password-strength");

passwordInput.addEventListener("keyup", function() {
  var password = passwordInput.value;
  if (password === "") {
    passwordStrength.style.display = "none";
  } else {
    passwordStrength.style.display = "inline";
    var strength = checkPasswordStrength(password);
    var strengthText = getStrengthText(strength);
    passwordStrength.innerHTML = strengthText;
    passwordStrength.style.color = getColor(strength);
  }
});

function checkPasswordStrength(password) {
  var hasUppercase = /[A-Z]/.test(password);  
  var hasLowercase = /[a-z]/.test(password);
  var hasNumber = /\d/.test(password);
  var hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);
  
  if (password.length < 8 || password.length > 12 || !hasUppercase || !hasLowercase || !hasNumber || !hasSpecialChar) {
    return "weak";
  } else {
    return "strong";
  }
}

function getStrengthText(strength) {
  if (strength === "strong") {
    return "Strong password";
  } else {
    return "Password is too weak. <br> (Include at least numbers, symbols, uppercase, and lowercase letter).";
  }
}   

function getColor(strength) {
  if (strength === "strong") {
    return "green";
  } else {
    return "red";
  }
}





//PROGRESS SIGN UP FORM REQUIRED ERROR FIELDS IN STEP 2

// Get the file upload elements
var verifyOne = document.getElementById('verify_one');
var verifyTwo = document.getElementById('verify_two');
var verifyThree = document.getElementById('verify_three');
var verifyFour = document.getElementById('verify_four');
var verifyFive = document.getElementById('verify_five');
var verifySix = document.getElementById('verify_six');
var verifySeven = document.getElementById('verify_seven');
var verifyEight = document.getElementById('verify_eight');

// Get the checkboxes for student, alumni, employee, and none
var studentCheckbox = document.getElementById('student');
var alumniCheckbox = document.getElementById('alumni');
var employeeCheckbox = document.getElementById('employee');
var noneCheckbox = document.getElementById('none');

// Add event listeners to all checkboxes
studentCheckbox.addEventListener('change', updateRequiredFields);
alumniCheckbox.addEventListener('change', updateRequiredFields);
employeeCheckbox.addEventListener('change', updateRequiredFields);
noneCheckbox.addEventListener('change', updateRequiredFields);

// Update the required fields based on which checkboxes are checked
function updateRequiredFields() {
// Reset the required attributes on all file upload elements
verifyOne.required = false;
verifyTwo.required = false;
verifyThree.required = false;
verifyFour.required = false;
verifyFive.required = false;
verifySix.required = false;
verifySeven.required = false;
verifyEight.required = false;

// Set the required attributes based on which checkboxes are checked
if (studentCheckbox.checked) {
    verifyOne.required = true;
    verifyTwo.required = true;
}
if (alumniCheckbox.checked) {
    verifyThree.required = true;
    verifyFour.required = true;
}
if (employeeCheckbox.checked) {
    verifyFive.required = true;
    verifySix.required = true;
}
if (noneCheckbox.checked) {
    verifySeven.required = true;
    verifyEight.required = true;
}
}


