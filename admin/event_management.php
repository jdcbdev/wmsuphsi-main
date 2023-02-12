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
    $event_management = 'active';
    require_once '../includes/admin-header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
<div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">Aministration</h3>
                    <a href="add-ancmt.php" class="button">Add New Member</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Description</th>
                            <th class="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> </td>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="">Edit</a>
                                        <a class="action-delete" href="">Delete</a>
                                    </div>
                                </td>
                        </tr>
                </tbody>
            </table>
        </div>
</body>
</html>
