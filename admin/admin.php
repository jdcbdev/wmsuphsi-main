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
    require_once '../classes/database.php';
    $database = new Database();
    $db=$database->connect();


    $page_title = 'Admin Dashboard | WMSU - Peace and Human Security Institute';
    $dashboard = 'active';

    $accountQuery = $db->query("SELECT COUNT(id) AS total_account FROM user_acc_data");
    $users = [];
    while($row = $accountQuery->fetchObject()){
        $users[] = $row;
    }

    $newsQuery = $db->query("SELECT COUNT(id) AS total_news FROM news");
    $news = [];
    while($row = $newsQuery->fetchObject()){
        $news[] = $row;
    }

    $eventQuery = $db->query("SELECT COUNT(id) AS total_events FROM event");
    $events = [];
    while($row = $eventQuery->fetchObject()){
        $events[] = $row;
    }
    $accountPending = $db->query("SELECT COUNT(id) AS total_pending FROM user_acc_data WHERE status = 'pending'");
    $pending = [];
    while($row = $accountPending->fetchObject()){
        $pending[] = $row;
    }
    
    // Fetch data for charts
    $alumniQuery = $db->query("SELECT COUNT(id) AS total_alumni FROM user_acc_data WHERE member_type = 'alumni'");
    $total_alumni = 0;
    $alumni = [];
    while ($row = $alumniQuery->fetchObject()) {
        $total_alumni = $row->total_alumni;
        $alumni[] = $row;
    }

    $employeeQuery  = $db->query("SELECT COUNT(id) AS total_employee FROM user_acc_data WHERE member_type = 'employee'");
    $total_employee = 0;
    $employee = [];
    while ($row = $employeeQuery->fetchObject()) {
        $total_employee = $row->total_employee;
        $employee[] = $row;
    }

    $studentQuery  = $db->query("SELECT COUNT(id) AS total_student FROM user_acc_data WHERE member_type = 'student'");
    $total_student = 0;
    $student = [];
    while ($row = $studentQuery->fetchObject()) {
        $total_student = $row->total_student;
        $student[] = $row;
    }

    $noneQuery  = $db->query("SELECT COUNT(id) AS total_none FROM user_acc_data WHERE member_type = 'none'");
    $total_none = 0;
    $none = [];
    while ($row = $noneQuery->fetchObject()) {
        $total_none = $row->total_none;
        $none[] = $row;
    }


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
            <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10 p-md-4 mt-3 mt-md-0">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 align-items-stretch">
                    <div class="col d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                            <?php foreach($users as $user){ ?>
                                <h5 class="card-title card-title-total">Total Accounts</h5>
                                <p class="card-text card-text-number"><?php echo $user->total_account; ?></p>
                                <p class="mb-0 mt-auto">
                                    <a class="view-all" href="../user_management">View All</a>
                                </p>
                             <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                            <?php foreach($events as $event){ ?>
                                <h5 class="card-title card-title-total">Total Events</h5>
                                <p class="card-text card-text-number"><?php echo $event->total_events; ?></p>
                                <p class="mb-0 mt-auto">
                                    <a class="view-all" href="../event">View All</a>
                                </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                            <?php foreach($news as $new){ ?>
                                <h5 class="card-title card-title-total">Total News</h5>
                                <p class="card-text card-text-number"><?php echo $new->total_news; ?></p>
                                <p class="mb-0">
                                    <a class="view-all" href="phsi_news.php">View All</a>
                                </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                            <?php foreach($pending as $pending){ ?>
                                <h5 class="card-title card-title-total">Pending Accounts</h5>
                                <p class="card-text card-text-number"><?php echo $pending->total_pending; ?></p>
                                <p class="mb-0">
                                    <a class="view-all" href="">Review Now</a>
                                </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    <div class="col-12 col-md-4 my-4 d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title card-title-total">Total Verified Account</h5>
                                <canvas id="status-chart-1"></canvas>
                                <p class="mb-0 mt-auto">
                                    <a class="view-all" href="">View Report</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 mb-4 mt-0 d-flex flex-column mt-md-4" style="box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);">
                    <iframe src="https://calendar.google.com/calendar/embed?height=400&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FManila&src=MDIzNjEyZTgwNjA0MTNjMDQwMTk1ZDI2ZWIzZGNlN2JmMzQ0NDdlZmNiY2IwNDMxNTI5MTIwMWFmNjc1Y2ZlZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23795548" style="padding: 10px" width="auto" height="100%" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
                
                <div class="row">
                    <div class="table-responsive">
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        var table = $('#table-dashboard-student').DataTable({
            responsive: true,
            fixedHeader: true,
            "dom": 'rt'
        });
        
        // Applications by Status
        
        var statusChart = new Chart(document.getElementById('status-chart-1'), {
        type: 'doughnut',
        data: {
            labels: ['WMSU ALUMNI', 'WMSU EMPLOYEE', 'WMSU STUDENT', 'OUTSIDE WMSU']  ,
            datasets: [{
                data: [20, 30, 100, 25],
                backgroundColor: ['#ac3c60', '#82b4bb', '#255e79', '#ffa500'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        }
    });

    var statusChart = new Chart(document.getElementById('myChart1'), {
        type: 'pie',
        data: {
            labels: ['WMSU ALUMNI', 'WMSU EMPLOYEE', 'WMSU STUDENT', 'OUTSIDE WMSU'],
            datasets: [{
                data: [20, 30, 100, 25],
                backgroundColor: ['#ac3c60', '#82b4bb', '#255e79', '#ffa500' ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true
        }
    });
    });
    
</script>

</body>
</html>


