    <?php

    //resume session here to fetch session values
    session_start();
    
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../home.php');
    }
    //if the above code is false then html below will be displayed

    require_once '../tools/variables.php';
    $page_title = 'Event Title | WMSU - Peace and Human Security Institute';
    $phsi_events = 'active';

    require_once '../includes/admin-header.php';
?>

<body>

    <?php require_once '../includes/admin-topnav.php'; ?>

    <div class="container-fluid">
        <div class="row">

            <?php require_once '../includes/admin-sidebar.php'; ?>
            
            <?php
                require_once '../classes/event_model.php'; 
                $event = new Event();
                // Check if the article ID is set in the URL
                if (isset($_GET['id'])) {
                    $article_id = $_GET['id'];
                    $article = $event->fetchRecordById($article_id);
                    if ($article) {
            ?>

            <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10 p-md-4">
                <div class="w-100">
                    <h5 class="col-12 fw-bold mb-3 mt-3 mt-md-0"><?php echo $article['event_title'] ?></h5>
                    <ul class="nav nav-tabs application">

                        <li class="nav-item active" id="li-rsvp">
                            <a class="nav-link">RSVP<span class="counter" id="counter-rsvp">0</span></a>
                        </li>

                        <li class="nav-item" id="li-confirm">
                            <a class="nav-link">Confirm<span class="counter" id="counter-confirm">0</span></a>
                        </li>

                        <li class="nav-item" id="li-attended">
                            <a class="nav-link">Attended<span class="counter" id="counter-attended">0</span></a>
                        </li>

                        <li class="nav-item" id="li-all">
                            <a class="nav-link">All<span class="counter" id="counter-all">0</span></a>
                        </li>

                        <li class="nav-item" id="add-account">
                            <a class="nav-link" id="add-new">Add Guest</a>
                        </li>
                    </ul>
                    <div class="table-responsive py-3 table-container">
                        
                    </div>
            </main>

        </div>
    </div>
    <script>
        function load(status){
            if(status == 'rsvp'){
                $.ajax({
                    type: "GET",
                    url: 'rsvp.php?id=<?php echo $article['id']; ?>',
                    success: function(result)
                    {
                        $('div.table-responsive').html(result);
                        dataTable = $("#table-rsvp").DataTable({
                            dom: 'Brtp',
                            responsive: true,
                            fixedHeader: true,
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: 'Excel',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'pdf',
                                    text: 'PDF',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'print',
                                    text: 'Print',
                                    className: 'border-white'
                                }
                            ],
                        });
                        dataTable.buttons().container().appendTo($('#MyButtons'));

                        $('input#keyword').on('input', function(e){
                            var status = $(this).val();
                            dataTable.columns([1]).search(status).draw();
                        });
                        $('select#member_type').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            }else if(status == 'confirm'){
                $.ajax({
                    type: "GET",
                    url: 'confirm.php',
                    success: function(result)
                    {
                        $('div.table-responsive').html(result);
                        dataTable = $("#table-confirm").DataTable({
                            dom: 'Brtp',
                            responsive: true,
                            fixedHeader: true,
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: 'Excel',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'pdf',
                                    text: 'PDF',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'print',
                                    text: 'Print',
                                    className: 'border-white'
                                }
                            ],
                        });
                        dataTable.buttons().container().appendTo($('#MyButtons'));

                        $('input#keyword').on('input', function(e){
                            var status = $(this).val();
                            dataTable.columns([1]).search(status).draw();
                        });
                        $('select#member_type').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            }else if(status == 'attended'){
                $.ajax({
                    type: "GET",
                    url: 'attended.php?id=<?php echo $article['id']; ?>',
                    success: function(result)
                    {
                        $('div.table-responsive').html(result);
                        dataTable = $("#table-attended").DataTable({
                            dom: 'Brtp',
                            responsive: true,
                            fixedHeader: true,
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: 'Excel',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'pdf',
                                    text: 'PDF',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'print',
                                    text: 'Print',
                                    className: 'border-white'
                                }
                            ],
                        });
                        dataTable.buttons().container().appendTo($('#MyButtons'));

                        $('input#keyword').on('input', function(e){
                            var status = $(this).val();
                            dataTable.columns([1]).search(status).draw();
                        });
                        $('select#member_type').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            } else if(status == 'all'){
                $.ajax({
                    type: "GET",
                    url: 'all.php?id=<?php echo $article['id']; ?>',
                    success: function(result)
                    {
                        $('div.table-responsive').html(result);
                        dataTable = $("#table-all").DataTable({
                            dom: 'Brtp',
                            responsive: true,
                            fixedHeader: true,
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: 'Excel',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'pdf',
                                    text: 'PDF',
                                    className: 'border-white'
                                },
                                {
                                    extend: 'print',
                                    text: 'Print',
                                    className: 'border-white'
                                }
                            ],
                        });
                        dataTable.buttons().container().appendTo($('#MyButtons'));

                        $('input#keyword').on('input', function(e){
                            var status = $(this).val();
                            dataTable.columns([1]).search(status).draw();
                        });
                        $('select#member_type').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            }
        }
        $(document).ready(function(){
            load('rsvp');
            $('ul.application .nav-item').on('click', function(){
                $('ul.application .nav-item').removeClass('active');
                $(this).addClass('active');
            });

            $('#li-rsvp').on('click', function(){
                load('rsvp');
            });

            $('#li-confirm').on('click', function(){
                load('confirm');
            });
            $('#li-attended').on('click', function(){
                load('attended');
            });
            $('#li-all').on('click', function(){
                load('all');
            });

            $('#comments').on('change', function(){
                if ($(this).is(":checked")) {
                    $('div.comments').show();
                    $('#pending-submit').text("Decline Application")
                }else{
                    $('div.comments').hide();
                    $('#pending-submit').text("Accept Application")
                }
            });

            $('#Confirmed').on('click', function(){
                $('div.documents').show();
            });

            $('#Withdrawn').on('click', function(){
                $('div.documents').hide();
            });

            $('#Waiting-Rejected').on('click', function(){
                $('#waiting-submit').text("Reject Application")
            });

            $('#ranking-comments').on('change', function(){
                if ($(this).is(":checked")) {
                    $('div.ranking-comments').show();
                }else{
                    $('div.ranking-comments').hide();
                }
            });

            $('#waiting-comments').on('change', function(){
                if ($(this).is(":checked")) {
                    $('div.waiting-comments').show();
                }else{
                    $('div.waiting-comments').hide();
                }
            });

            $('#qualified-comments').on('change', function(){
                if ($(this).is(":checked")) {
                    $('div.qualified-comments').show();
                }else{
                    $('div.qualified-comments').hide();
                }
            });

            $('div.photo-container').lightGallery({
                thumbnail: false,
                animateThumb: false,
                showThumbByDefault: false
            }); 
        });
    </script>

<?php
    } else {
      // Display error message if article is not found
      echo 'We apologize, but we could not locate the article you are trying to access. It may no longer be available or may have been moved to a different location.';
    }
  } else {
    // Display error message if article ID is not set in URL
    echo 'Invalid article ID.';
  }
?>
</body>
</html>
