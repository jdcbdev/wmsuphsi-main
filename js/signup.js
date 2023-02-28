
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

function showProfile(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        $("#profile-preview").attr('src', src);
    }
}

function showBackground(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        $("#background-preview").attr('src', src);
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