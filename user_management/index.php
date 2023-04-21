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
    //if the above code i   s false then html below will be displayed

    require_once '../tools/variables.php';
    $page_title = 'User Management | WMSU - Peace and Human Security Institute';
    $users = 'active';

    require_once '../includes/admin-header.php';
?>
<body>
    <?php
        require_once '../includes/admin-topnav.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
                require_once '../includes/admin-sidebar.php';
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10 p-md-4">
                <div class="w-100">
                    <h5 class="col-12 fw-bold mb-3 mt-3 mt-md-0">Users Account Management</h5>
                    <ul class="nav nav-tabs application">
                        <li class="nav-item active" id="li-pending">
                            <a class="nav-link">New/Pending<span class="counter" id="counter-pending">0</span></a>
                        </li>
                        <li class="nav-item" id="li-verified">
                            <a class="nav-link">Verified <span class="counter" id="counter-verified">0</span></a>
                        </li>
                        <li class="nav-item" id="li-all">
                            <a class="nav-link">All<span class="counter" id="counter-all">0</span></a>
                        </li>
                        <li class="nav-item" id="add-account">
                            <a class="nav-link">Add Account</a>
                        </li>
                    </ul>
                    <div class="table-responsive py-3 table-container">

                    </div>
                </div>
            </main>
            <?php require_once './pending.modal.php'; ?>
            <?php require_once './verified.modal.php'; ?>
        </div>
    </div>
    <script>
        function load(status){
            if(status == 'pending'){
                $.ajax({
                    type: "GET",
                    url: 'pending.php',
                    success: function(result)
                    {
                        $('div.table-responsive').html(result);
                        dataTable = $("#table-pending").DataTable({
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
                        $('select#student_type').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                        $('select#program').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([4]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            }else if(status == 'verified'){
                $.ajax({
                    type: "GET",
                    url: 'verified.php',
                    success: function(result)
                    {
                        $('div.table-responsive').html(result);
                        dataTable = $("#table-verified").DataTable({
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
                        $('select#student_type').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                        $('select#program').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([4]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            }else if(status == 'all'){
                $.ajax({
                    type: "GET",
                    url: 'all.php',
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
                        $('select#student_type').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([3]).search(status).draw();
                        });
                        $('select#program').on('change', function(e){
                            var status = $(this).val();
                            dataTable.columns([4]).search(status).draw();
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });
            }
        }
        $(document).ready(function(){
            load('pending');
            $('ul.application .nav-item').on('click', function(){
                $('ul.application .nav-item').removeClass('active');
                $(this).addClass('active');
            });

            $('#li-pending').on('click', function(){
                load('pending');
            });

            $('#li-verified').on('click', function(){
                load('verified');
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
</body>
</html>