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
    require_once '../classes/basic.database.php';
    require_once '../includes/admin-header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

    $accountQuery = $db->query("SELECT COUNT(id) AS total_account FROM user_acc_data");

    while($row = $accountQuery->fetchObject()){
        $users[] = $row;
    }

    $newsQuery = $db->query("SELECT COUNT(id) AS total_account FROM news");

    while($row = $newsQuery->fetchObject()){
        $news[] = $row;
    }

    $eventQuery = $db->query("SELECT COUNT(id) AS total_account FROM event");

    while($row = $eventQuery->fetchObject()){
        $events[] = $row;
    }
?>

    <div class="page-content">
        <div class="analytics">
            <div class="card">
            <?php foreach($users as $user){ ?>
                <div class="card-head">
                    <h2><?php echo $user->total_account; ?></h2>
                     <span class="uil uil-users-alt"></span>
                    </div>
                <?php } ?>
                    
                    <div class="card-progress">
                        <small>Total Users</small>
                        <div class="card-date">
                            <p><?php echo "As of " . date('d F, Y (l)')?></p>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                <?php foreach($events as $event){ ?>
                    <div class="card-head">
                        <h2><?php echo $event->total_account; ?></h2>
                        <span class="uil uil-podium"></span>
                    </div>
                    <?php } ?>
                    <div class="card-progress">
                        <small>Upcoming Events</small>
                        <div class="card-date">
                            <p><?php echo "As of " . date('d F, Y (l)')?></p>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                <?php foreach($news as $new){ ?>
                    <div class="card-head">
                        <h2><?php echo $new->total_account; ?></h2>
                        <span class="uil uil-clipboard-notes"></span>
                        </div>
                        <?php } ?>
                    <div class="card-progress">
                        <small>Total News and Features</small>
                        <div class="card-date">
                            <p><?php echo "As of " . date('d F, Y (l)')?></p>
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
  


                    <div>
                        <table id="user-table" class="display cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span class=""></span> NAME </th>
                                    <!--<th><span class=""></span> USER TYPE</th>-->
                                    <th><span class=""></span> CONTACT</th>
                                    <th><span class=""></span> FULL ADDRESS</th>
                                    <th><span class=""></span> SEX</th>
                                    <!--<th><span class=""></span> USERNAME</th>-->
                                    <!--<th><span class=""></span> PASSWORD</th>-->
                                    <th><span class=""></span> ROLE</th>
                                    <th><span class=""></span> ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
    
    require_once '../classes/user.class.php';
    
    $user = new Users();
    //We will now fetch all the records in the array using loop
    //use as a counter, not required but suggested for the table
    $i = 1;
    //loop for each record found in the array
    foreach ($user->fetchUser() as $value){ 
        //start of loop
        $profile_picture = $value['profile_picture'];
    ?>

                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img" style="background-image:  url('../uploads/<?php echo $profile_picture; ?>')"></div>
                                            <div class="client-info">
                                                <h4><?php echo $value['firstname'].' '.$value['middlename'].' '.$value['lastname'].' '.$value['suffix'] ?></h4>
                                                <small><?php echo $value['email'] ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <!--<td><small> WMSU Student / WMSU UNESCO Club</small></td>-->
                                    <td><small><?php echo $value['contact_number'] ?></small>
                                    <td><small><?php echo $value['bldg_house_no'].' '.$value['street_name'].' '.$value['barangay'].', '.$value['city'].', '.$value['province'] ?></small>
                                    <td><small><?php echo $value['sex'] ?></small></td>
                                    <!--<td><small><?php echo $value['username'] ?></small></td>-->
                                    <!--<td><small><?php echo $value['password'] ?></small></td>-->                       
                                    <td><small><?php echo $value['role'] ?></small></td>
                                    <td>
                                    <div class="action">
                                            <a class="action-edit" id="edit" value="">Edit</a>
                                            <a class="action-delete" id="delete" value="">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
$i++;
//end of loop
}
?> 


                            </tbody>
                        </table>
                    </div>

                </div> 
            
            </div>         

        
<?php
    require_once '../includes/admin-footer.php';
?>