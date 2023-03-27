//Modal Functions
$(document).on('click', 'span.close', function(e){
    $('#edit-modal').css('display', 'none');
    $("#add-modal").css('display', 'none');
});

function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        $("#file-preview").attr('src', src);
    }
}

$(document).on('click', '#add-new', function(e){
    $('#add-modal').css('display', 'block');
});

$(document).ready(function(e){
    //Add new
    $('#addform').on('submit', function(e){
        e.preventDefault();
        
        $.ajax({
            url: "../unesco_action/create-action.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response){
                $("#file-preview").attr('src', '');
                $("#addform")[0].reset(); 
                $("#add-modal").css('display', 'none');
                fetch();
                alert(response);
            }
        });
    });
});

//Fetch All Records
function fetch(){
    $.ajax({
        url: '../unesco_action/read-action.php',
        type: 'post',
        success: function(response){
            $('#fetch').html(response);
        }
    });
}
fetch();

//Delete
$(document).on('click', '#delete', function(e){
    e.preventDefault();
    if(window.confirm('Are you sure you want to delete the record?'))
    {
        var delete_id = $(this).attr('value'); 
    
        $.ajax({
            url: '../unesco_action/delete-action.php',
            type: 'post',
            data: {delete_id: delete_id},
            success: function(response){
                fetch();
                alert(response);
            }
        });				
    }
    else
    {
        return false;
    }
});

//Edit
$(document).on('click', '#edit', function(e){
    e.preventDefault();
    
    var update_id = $(this).attr('value');
    
    $.ajax({
        url: '../unesco_action/edit-action.php',
        type: 'post',
        data: {update_id: update_id},
        success: function(response){
            $('#edit-modal').css('display', 'block');
            $('#file-preview').css('display', 'block');
            $('#edit-modal').html(response);
        }
    });        
});

//update
$(document).on('submit', '#editform', function(e){
    e.preventDefault();
        
    $.ajax({
        url: "../unesco_action/update-action.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response){
            //$("#file-preview").attr('src', '');
            $("#edit-modal").css('display', 'none');
            fetch();
            alert(response);
        }
    });
});