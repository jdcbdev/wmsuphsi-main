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
                //
                //
                /*$user->firstname = htmlentities($_POST['firstname']);
                $user->middlename = htmlentities($_POST['middlename']);
                $user->lastname = htmlentities($_POST['lastname']);
                $user->suffix = htmlentities($_POST['suffix']);
                $user->email = htmlentities($_POST['email']);
                $user->contact_number = $_POST['contact_number'];   
                $user->street_name = $_POST['street_name'];
                $user->bldg_house_no = $_POST['bldg_house_no'];
                $user->username = $_POST['username'];
                $user->password = $_POST['password'];

                if(isset($_POST['sex'])){
                    $user->sex = $_POST['sex'];
                }
                if(isset($_POST['province'])){
                    $user->province = $_POST['province'];
                }
                if(isset($_POST['city'])){
                    $user->city = $_POST['city'];
                }
                if(isset($_POST['barangay'])){
                    $user->barangay = $_POST['barangay'];
                } */
                if(isset($_POST['role'])){
                    $user->role = $_POST['role'];
                }
                if(isset($_POST['status'])){
                    $user->status = $_POST['status'];
                }
               /* if(isset($_POST['member_type'])){
                    $user->member_type = $_POST['member_type'];
                }*/
                // edit now / update
                if($user->editRoleAndStatus()){  
                    //redirect user to user page after saving
                        header('location: index.php');
                    }
                    ob_end_flush(); // end output buffering and send output to browser

            }else {
                if ($user->fetch($_GET['id'])){
                    $data = $user->fetch($_GET['id']);

                    //
                    //
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
                    <select name="sex" id="sex" disabled>
                        <option value="Male" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'Male') { echo 'selected'; } ?> >Male</option>
                        <option value="Female" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'Female') { echo 'selected'; } ?>>Female</option>
                    </select>
                    </div>

                    <div class="input-box">
                        <span class="details">Contact No.</span>
                        <input type="text" name="contact_number" id="contact_number" placeholder="" required value="<?php echo $article['contact_number'] ?>" disabled>
                    </div>

                    <div class="input-box">
                    <span class="details">Province</span>
                    <select name="province" id="province" disabled>
                        <option value="">Select Province</option>
                        <option value="City of Isabela" <?php if ($article['province'] == 'City of Isabela') { echo 'selected'; } ?>>City of Isabela</option>
                        <option value="Zamboanga del Norte" <?php if ($article['province'] == 'Zamboanga del Norte') { echo 'selected'; } ?>>Zamboanga del Norte</option>
                        <option value="Zamboanga Sibugay" <?php if ($article['province'] == 'Zamboanga Sibugay') { echo 'selected'; } ?>>Zamboanga Sibugay</option>
                        <option value="Zamboanga del Sur" <?php if ($article['province'] == 'Zamboanga del Sur') { echo 'selected'; } ?>>Zamboanga del Sur</option>
                    </select>
                    </div>

                    <div class="input-box">
                    <span class="details">City/Municipality</span>
                    <select name="city" id="city" disabled>
                        <option value=""  <?php if ($article['city'] == '') { echo 'selected'; } ?>>Select City/Municipality</option>
                    </select>
                    </div>

                    <div class="input-box">
                    <span class="details">Barangay</span>
                    <select name="barangay" id="barangay" disabled value="<?php if(isset($article['barangay'])) { echo $article['barangay']; } ?>">
                        <option value="">Select Barangay</option>
                    </select>
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
                    
                    <div class="sub-title">Member Types Application</div><br>
                    <div class="input-box">

                    <div class="user-details" style="display: contents;">
                        <div class="image-container">
                        <p>Student ID</p>
                            <img src="../uploads/<?php echo $verify_one; ?>" alt="" style="width: 25%; height: auto; margin-right: 20px;">
                            <img src="../uploads/<?php echo $verify_two; ?>" alt="" style="width: 25%; height: auto; ">
                        </div>

                    <div class="image-container">
                    <p>Alumni ID</p>
                            <img src="../uploads/<?php echo $verify_three; ?>" alt="" style="width: 25%; height: auto; margin-right: 20px;">
                            <img src="../uploads/<?php echo $verify_four; ?>" alt="" style="width: 25%; height: auto; ">
                    </div>
                    <div class="image-container">
                    <p>Employee ID</p>
                            <img src="../uploads/<?php echo $verify_five; ?>" alt="" style="width: 25%; height: auto; margin-right: 20px;">
                            <img src="../uploads/<?php echo $verify_six; ?>" alt="" style="width: 25%; height: auto; ">
                    </div>

                    
                    <div class="image-container">
                    <p>Not-Affiliated (Outside WMSU) ID</p>
                            <img src="../uploads/<?php echo $verify_seven; ?>" alt="" style="width: 25%; height: auto; margin-right: 20px;">
                            <img src="../uploads/<?php echo $verify_eight; ?>" alt="" style="width: 25%; height: auto; ">
                    </div>

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
                        <option value="phsi_c_admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'phsi_c_admin') { echo 'selected'; } ?>>PHSI Content Admin</option>
                        <option value="unesco_c_admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'unesco_c_admin') { echo 'selected'; } ?>>UNESCO Content Admin</option>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/signup.js"></script>
<script src="../js/address.js"></script>


</body>
</html>