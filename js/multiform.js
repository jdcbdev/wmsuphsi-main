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
                url: "../login/signup.php",
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