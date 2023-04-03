
function showPw(){
    let input = document.getElementById("password");
    if(input.type == "password"){
        input.type = "text";
    } else {
        input.type = "password";
    }
}

//This will remove non-numeric characters bitches!
const numberInput = document.getElementById("contact_number");
numberInput.addEventListener("input", function(event) {
  // Remove non-numeric characters
  const newValue = event.target.value.replace(/[^0-9]/g, '');
  event.target.value = newValue;
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

//PROGRESS SIGN UP FORM REQUIRED ERROR FIELDS




