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
    $page_title = 'Admin Dasdboard | WMSU - Peace and Human Security Institute';
    $dashboard = 'active';

    

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
                            
                                <h5 class="card-title card-title-total">Total Accounts</h5>
                                <p class="card-text card-text-number">0</p>
                                <p class="mb-0 mt-auto">
                                    <a class="view-all" href="">View All</a>
                                </p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title card-title-total">Total Events</h5>
                                <p class="card-text card-text-number">0</p>
                                <p class="mb-0 mt-auto">
                                    <a class="view-all" href="">View All</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title card-title-total">Total News</h5>
                                <p class="card-text card-text-number">0</p>
                                <p class="mb-0">
                                    <a class="view-all" href="">View All</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title card-title-total">Pending Applications</h5>
                                <p class="card-text card-text-number">0</p>
                                <p class="mb-0">
                                    <a class="view-all" href="">Review Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    <div class="col-12 col-md-4 my-4 d-flex flex-column">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title card-title-total">Total Organizations Account</h5>
                                <canvas id="status-chart-1""></canvas>
                                <p class="mb-0 mt-auto">
                                    <a class="view-all" href="">View Report</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 mb-4 mt-0 d-flex flex-column mt-md-4">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title card-title-total">Total User Type Breakdown</h5>
                                <canvas id="myChart1""></canvas>
                                <p class="mb-0 mt-auto">
                                    <a class="view-all" href="">View Report</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover responsive" id="table-dashboard-student">
                            <thead>
                                <tr>
                                    <th scope="col">Rank No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Organization</th>
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 red"> 1</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>john.smith@abc.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-unesco">UNESCO</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    </td>                               
                                    <td><i class="fa-solid fa-trophy me-2 orange"> 2</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>jennifer.lee@xyz.com</td>
                                    
                                    <td><span class="type-ALUMNI">WMSU ALUMNI</span></td>
                                    <td><span class="org-unesco">UNESCO</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    </td>
                                    <td><i class="fa-solid fa-trophy me-2 yellow"> 3</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>juan.garcia@mno.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-unesco">UNESCO</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 4</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>hyejin.chung@pqr.com</td>
                                    <td><span class="type-EMPLOYEE">WMSU EMPLOYEE</span></td>
                                    <td><span class="org-phsi">PHSI</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr> 
                                    <td><i class="fa-solid fa-trophy me-2 green"> 5</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>hiroshi.tanaka@def.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 6</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>minji.kim@lmn.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-unesco">UNESCO</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 7</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>minh.nguyen@rst.com</td>
                                    <td><span class="type-ALUMNI">WMSU ALUMNI</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 8</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>yukihiro.sato@uvw.com</td>
                                    <td><span class="type-EMPLOYEE">WMSU EMPLOYEE</span></td>
                                    <td><span class="org-phsi">PHSI</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 9</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 10</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 11</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 12</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 13</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 14</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 15</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 16</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 17</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 18</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 19</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-trophy me-2 green"> 20</i></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-img bg-img" style="background-image: url('../images/student-profile/user-icon.png');"></div>
                                            <div class="client-info">
                                                <h4>Malaga, Arjay L.</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>maria.hernandez@xyz.com</td>
                                    <td><span class="type-STUDENT">WMSU STUDENT</span></td>
                                    <td><span class="org-none">NONE</span></td>
                                    <td>09237567813</td>
                                    <td>
                                        <div class="action-button">
                                            <a title="View Application" href="" class="me-2 green" data-bs-toggle="modal" data-bs-target="#myModal-Ranking"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a title="View Profile" href="" class="me-2 green"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            labels: ['PHSI', 'UNESCO']  ,
            datasets: [{
                data: [20, 30],
                backgroundColor: ['#107869', '#800000'],
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
    


























    /*var ctx = document.getElementById('myChart1');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['WMSU ALUMNI', 'WMSU EMPLOYEE', 'WMSU STUDENT', 'OUTSIDE WMSU'],
                datasets: [{
                    data: [20, 30, 100, 25],
                    backgroundColor: ['#47B39C', '#EC6B56', '#3367D6', '#ffa500' ],
                }]
                },
        
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
        });*/
</script>
</body>
</html>