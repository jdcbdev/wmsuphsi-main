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

<script>
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
</script>

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