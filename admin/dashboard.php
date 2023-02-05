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
    $dashboard = 'active';
    require_once '../includes/admin-header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
        
        
        <main>
            
           <!--<div class="page-header">
                <h1>Welcome <span>Clarise Jane Tayao</span></h1>
                <small>Home / Dashboard</small>
            </div> -->
            <div class="page-content">
            
                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>2</h2>
                            <span class="uil uil-users-alt"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Users</small>
                            <div class="card-date">
                                <p>As of January 30, 2023 09:06 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>3</h2>
                            <span class="uil uil-podium"></span>
                        </div>
                        <div class="card-progress">
                            <small>Upcoming Events</small>
                            <div class="card-date">
                                <p>As of January 30, 2023 09:06 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>10</h2>
                            <span class="uil uil-clipboard-notes"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Contents</small>
                            <div class="card-date">
                                <p>As of January 30, 2023 09:06 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>0</h2>
                            <span class="uil uil-comment-question"></span>
                        </div>
                        <div class="card-progress">
                            <small>Inquiries</small>
                            <div class="card-date">
                                <p>As of January 30, 2023 09:06 PM</p>
                            </div>
                        </div>
                    </div>

                    

                </div>


                <!--<div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <span>Filter by User Type</span>
                            <select name="" id="" style="width: 30%;">
                                <option value="">All User Types</option>
                                <option value="">WMSU Student</option>
                                <option value="">WMSU Employee</option>
                                <option value="">WMSU Alumni</option>
                                <option value="">Peace and Human Security Institute</option>
                                <option value="">WMSU Youth Peace Mediatoirs - UNESCO Club</option>
                                <option value="">WMSU Biosafety and Biosecurity Committee</option>
                            </select>
                            <button>Download Excel / CSV list</button>
                        </div>

                        <div class="browse">
                           <input type="search" placeholder="Name Search" class="record-search" style="width: 250px;" >
                        </div>
                    </div>

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span class="las la-sort"></span> NAME </th>
                                    <th><span class="las la-sort"></span> USER TYPE</th>
                                    <th><span class=""></span> ADDRESS</th>
                                    <th><span class=""></span> GENDER</th>
                                    <th><span class=""></span> DATE</th>
                                    <th><span class="las la-sort"></span> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>

                                    <td>1</td>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img" style="background-image: url(../images/student-profile/pic-1.png)"></div>
                                            <div class="client-info">

                                                <h4>Arjay Malaga</h4>

                                                <small>xt202001283@wmsu.edu.ph</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <small>WMSU UNESCO Club</small>
                                        
                                    </td>

                                    <td>
                                        <small>Guiwan, Zamboanga City</small>
   
                                    <td>
                                        <small>Male</small>
                                    </td>                                   
                             
                                    <td>
                                        <small>29 January, 2023</small>
                                    </td>
                            
                                    <td>
                                        <div class="actions">
                                            <span class="las la-ellipsis-v"></span>
                                            <span class="las la-eye"></span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div> 
            
            </div> 
            
        </main>
        
<?php
    require_once '../includes/admin-footer.php';
?>