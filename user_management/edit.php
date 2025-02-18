<?php

    //resume session here to fetch session values
    ob_start(); // start output buffering
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
    $page_title = 'Edit User | WMSU - Peace and Human Security Institute';
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
            
            <div class="content">
                
            <!--PERSONAL INFORMATION-->
            <a class="back" href="index.php" style="color: #198754;text-decoration: none;"><i class='bx bx-caret-left'></i>Back</a>
            <div class="sub-title">Personal Information
            </div>
            
            <?php
            
            require_once '../classes/user.class.php';

            //if add user is submitted
            $user = new Users();
            if(isset($_POST['submit'])){

                //sanitize user inputs
                $user->id = $_GET['id'];

                if(isset($_POST['role'])){
                    $user->role = $_POST['role'];
                }
                if(isset($_POST['status'])){
                    $user->status = $_POST['status'];
                }
                // edit now / update
                if($user->editRoleAndStatus()){  
                    //redirect user to user page after saving
                        header('location: index.php');
                    }
                    ob_end_flush(); // end output buffering and send output to browser

            }else {
                if ($user->fetch($_GET['id'])){
                    $data = $user->fetch($_GET['id']);

                    $_POST['role'] = $data['role'];
                    $_POST['status'] = $data['status'];
                    

                }

            }
            ?>

            <?php
                require_once '../classes/user.class.php';
                $user = new Users();
                
                // Check if the article ID is set in the URL
                if (isset($_GET['id'])) {
                    $article_id = $_GET['id'];
                    $article = $user->fetchRecordById($article_id);

                    if ($article) {

                $profile_picture = $article['profile_picture'];
                $background_image = $article['background_image'];
                $verify_one = $article['verify_one'];
                $verify_two = $article['verify_two'];
                $verify_three = $article['verify_three'];
                $verify_four = $article['verify_four'];     
                $verify_five = $article['verify_five'];
                $verify_six = $article['verify_six'];
                $verify_seven = $article['verify_seven'];
                $verify_eight = $article['verify_eight'];
            ?>


            <link rel="stylesheet" href="../css/user.css">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">

            
                <div class="user-details">

                    <div class="profile-container" style="height: 200px; ;margin-bottom: 30px;">
                        <img src="../uploads/<?php echo $background_image; ?>" class="background-image" alt="Background Image" disabled>
                            <div class="profile-wrapper">
                                <img src="../uploads/<?php echo $profile_picture; ?>" class="profile-image" alt="Profile Image" disabled>
                            </div>
                    </div>
                                    
                    <div class="input-box">
                        <span class="details">Firstname</span>
                        <input type="text" name="firstname" placeholder=""  value="<?php echo $article['firstname'] ?>" disabled>
                    </div>

        
                    <div class="input-box">
                        <span class="details-opt">Middlename</span>
                        <input type="text" name="middlename" placeholder="" value="<?php echo $article['middlename'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details">Lastname</span>
                        <input type="text" name="lastname"  placeholder=""  value="<?php echo $article['lastname'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Suffix</span>
                        <input type="text" name="suffix" placeholder="" value="<?php echo $article['suffix'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder=""  value="<?php echo $article['email'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details">Sex</span>
                        <input type="text" name="sex" placeholder=""  value="<?php echo $article['sex'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details">Contact No.</span>
                        <input type="text" name="contact_number" id="contact_number" placeholder="" required value="<?php echo $article['contact_number'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details">Province</span>
                        <input type="text" name="province" placeholder=""  value="<?php echo $article['province'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details">City/Municipality</span>
                        <input type="text" name="city" placeholder=""  value="<?php echo $article['city'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details">Barangay</span>
                        <input type="text" name="barangay" placeholder=""  value="<?php echo $article['barangay'] ?>" disabled>
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Street Name</span>
                        <input type="text" name="street_name"  disabled placeholder=""  value="<?php echo $article['street_name'] ?>">
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Building/House No.</span>
                        <input type="text" name="bldg_house_no" disabled placeholder="" value="<?php echo $article['bldg_house_no'] ?>">
                    </div>
                    </div>
                    
                    <div class="sub-title">Member Type/s Application</div><br>
                    <div class="input-box">

                    <div class="user-details" style="display: contents;">

                    <?php if (!empty($verify_one) || !empty($verify_two)) { ?>
                        <div class="image-container">
                            <p>Student ID</p>
                            <img src="../uploads/<?php echo $verify_one; ?>" alt="" style="width: 25%; height: auto; margin-right: 20px;">
                            <img src="../uploads/<?php echo $verify_two; ?>" alt="" style="width: 25%; height: auto; ">
                            <input type="submit" name="decline-Stud" class="decline-btn" id="deline-id-btn" value="Decline" style="margin-left: 12%;">
                            <input type="submit" name="verify-Stud" class="verify-btn" id="verify-id-btn"value="Approve" style="margin-left: 20px;">
                        </div>
                    <?php } ?>

                    <?php if (!empty($verify_three) || !empty($verify_four)) { ?>
                        <div class="image-container">
                            <p>Alumni ID</p>
                            <img src="../uploads/<?php echo $verify_three; ?>" alt="" style="width: 25%; height: auto; margin-right: 20px;">
                            <img src="../uploads/<?php echo $verify_four; ?>" alt="" style="width: 25%; height: auto; ">
                            <input type="submit" name="decline-Alm" class="decline-btn" id="deline-id-btn" value="Decline" style="margin-left: 12%;">
                            <input type="submit" name="verify-Alm" class="verify-btn" id="verify-id-btn"value="Approve" style="margin-left: 20px;">
                        </div>
                    <?php } ?>

                    <?php if (!empty($verify_five) || !empty($verify_six)) { ?>
                        <div class="image-container">
                            <p>Employee ID</p>
                            <img src="../uploads/<?php echo $verify_five; ?>" alt="" style="width: 25%; height: auto; margin-right: 20px;">
                            <img src="../uploads/<?php echo $verify_six; ?>" alt="" style="width: 25%; height: auto; ">
                            <input type="submit" name="decline-Emp" class="decline-btn" id="deline-id-btn" value="Decline" style="margin-left: 12%;">
                            <input type="submit" name="verify-Emp" class="verify-btn" id="verify-id-btn"value="Approve" style="margin-left: 20px;">
                        </div>
                    <?php } ?>

                    <?php if (!empty($verify_seven) || !empty($verify_eight)) { ?>
                        <div class="image-container">
                            <p>Not-Affiliated (Outside WMSU) ID</p>
                            <img src="../uploads/<?php echo $verify_seven; ?>" alt="" style="width: 25%; height: auto; margin-right: 20px;">
                            <img src="../uploads/<?php echo $verify_eight; ?>" alt="" style="width: 25%; height: auto; ">
                            <input type="submit" name="decline-Non" class="decline-btn" id="deline-id-btn" value="Decline" style="margin-left: 12%;">
                            <input type="submit" name="verify-Non" class="verify-btn" id="verify-id-btn"value="Approve" style="margin-left: 20px;">
                        </div>
                    <?php } ?>

                    </div>

                    
                    <div class="sub-title">User Privelages</div><br>
                    <div class="user-details">

                    <div class="input-box">
                    <span class="details">Role</span>
                    <select name="role" id="role" required>
                        <option value="user" <?php if(isset($_POST['role']) && $_POST['role'] == 'user') { echo 'selected'; } ?> >User</option>
                        <option value="super_admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'super_admin') { echo 'selected'; } ?>>Super Admin</option>
                        <option value="phsi_admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'phsi_admin') { echo 'selected'; } ?>>PHSI Admin</option>
                        <option value="unesco_admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'unesco_admin') { echo 'selected'; } ?>>UNESCO Admin</option>
                    </select>
                    </div>
                    
                    <div class="input-box">
                    <span class="details">Status</span>
                    <select name="status" id="status" required >
                        <option value="Pending" <?php if(isset($_POST['status']) && $_POST['status'] == 'Pending') { echo 'selected'; } ?>>Pending</option>
                        <option value="Verified" <?php if(isset($_POST['status']) && $_POST['status'] == 'Verified') { echo 'selected'; } ?>>Verified</option>
                    </select>
                    </div>
                    </div>
        
                    <!--SIGN UP BUTTON-->
                    <div class="button">
                    <input type="submit" name="submit"  value="Save">
                    </div>
                </form>

                <?php
                    } else {
                    // Display error message if article is not found
                    echo 'Article not found.';
                    }
                } else {
                    // Display error message if article ID is not set in URL
                    echo 'Invalid article ID.';
                }
                ?>


        </div>
    </div>
</div>

<!--<div id="approve-dialog" class="dialog" title="Approve">
    <p><span>Please confirm that you want to approve this application for [member type].</span></p>
</div>

<div id="decline-dialog" class="dialog" title="Decline">
    <p><span>Please confirm that you want to decline this application for [member type]</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#approve-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".verify-btn").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#verif-id-btn").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "No" : function() {
                    $(this).dialog("close");
                }
            });

            $("#verif-id-btn").dialog("open");
        });
    });

    $(document).ready(function() {
        $("#decline-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".decline-btn").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#decline-id-btn").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "No" : function() {
                    $(this).dialog("close");
                }
            });

            $("#decline-id-btn").decline("open");
        });
    });
</script>-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/signup.js"></script>
<script src="../js/address.js"></script>


</body>
</html>