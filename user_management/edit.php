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
            
            <div class="sub-title">Personal Information
            <a class="back" href="index.php"><i class='bx bx-caret-left'></i>Back</a>
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
                $user->firstname = htmlentities($_POST['firstname']);
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
                }
                if(isset($_POST['role'])){
                    $user->role = $_POST['role'];
                }
                if(isset($_POST['status'])){
                    $user->status = $_POST['status'];
                }
                if(isset($_POST['member_type'])){
                    $user->member_type = $_POST['member_type'];
                }
                // edit now / update
                if($user->edit()){  
                    //redirect user to user page after saving
                        header('location: index.php');
                    }
                    ob_end_flush(); // end output buffering and send output to browser

            }else {
                if ($user->fetch($_GET['id'])){
                    $data = $user->fetch($_GET['id']);

                    //
                    //
                    $_POST['verify_one'] = $data['verify_one'];
                    $_POST['verify_two'] = $data['verify_two'];

                    $_POST['firstname'] = $data['firstname'];
                    $_POST['middlename']= $data['middlename'];
                    $_POST['lastname']= $data['lastname'];
                    $_POST['suffix']= $data['suffix'];
                    $_POST['email'] = $data['email'];
                    $_POST['middlename'] = $data['middlename'];
                    $_POST['contact_number'] = $data['contact_number'];
                    $_POST['sex'] = $data['sex'];
                    $_POST['email'] = $data['email'];
                    $_POST['contact_number'] = $data['contact_number'];
                    $_POST['province'] = $data['province'];
                    $_POST['city'] = $data['city'];
                    $_POST['barangay'] = $data['barangay'];
                    $_POST['street_name'] = $data['street_name'];
                    $_POST['bldg_house_no'] = $data['bldg_house_no'];
                    $_POST['username'] = $data['username'];
                    $_POST['password'] = $data['password'];
                    $_POST['role'] = $data['role'];
                    $_POST['status'] = $data['status'];
                    $_POST['member_type'] = $data['member_type'];

                }

            }


            ?>

            <form action="edit.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">


                <div class="user-details">
                    
                    <div class="input-box">
                        <span class="details">Firstname</span>
                        <input type="text" name="firstname" placeholder="" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
                    </div>

        
                    <div class="input-box">
                        <span class="details-opt">Middlename</span>
                        <input type="text" name="middlename" placeholder="" value="<?php if(isset($_POST['middlename'])) { echo $_POST['middlename']; } ?>">
                    </div>

                    <div class="input-box">
                        <span class="details">Lastname</span>
                        <input type="text" name="lastname"  placeholder="" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Suffix</span>
                        <input type="text" name="suffix" placeholder="" value="<?php if(isset($_POST['suffix'])) { echo $_POST['suffix']; } ?>">
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                    </div>

                    <div class="input-box">
                    <span class="details">Sex</span>
                    <select name="sex" id="sex" required>
                        <option value="Male" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'Male') { echo 'selected'; } ?> >Male</option>
                        <option value="Female" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'Female') { echo 'selected'; } ?>>Female</option>
                    </select>
                    </div>

                    <div class="input-box">
                        <span class="details">Contact No.</span>
                        <input type="text" name="contact_number" id="contact_number" placeholder="" required value="<?php if(isset($_POST['contact_number'])) { echo $_POST['contact_number']; } ?>">
                    </div>

                    <div class="input-box">
                    <span class="details">Province</span>
                    <select name="province" id="province" required>
                        <option value="">Select Province</option>
                        <option value="City of Isabela" <?php if(isset($_POST['province']) && $_POST['province'] == 'City of Isabela') { echo 'selected'; } ?>>City of Isabela</option>
                        <option value="Zamboanga del Norte" <?php if(isset($_POST['province']) && $_POST['province'] == 'Zamboanga del Norte') { echo 'selected'; } ?>>Zamboanga del Norte</option>
                        <option value="Zamboanga Sibugay" <?php if(isset($_POST['province']) && $_POST['province'] == 'Zamboanga Sibugay') { echo 'selected'; } ?>>Zamboanga Sibugay</option>
                        <option value="Zamboanga del Sur" <?php if(isset($_POST['province']) && $_POST['province'] == 'Zamboanga del Sur') { echo 'selected'; } ?>>Zamboanga del Sur</option>
                    </select>
                    </div>

                    <div class="input-box">
                    <span class="details">City/Municipality</span>
                    <select name="city" id="city" required>
                        <option value=""  <?php if(isset($_POST['province']) && $_POST['province'] == '') { echo 'selected'; } ?>>Select City/Municipality</option>
                    </select>
                    </div>

                    <div class="input-box">
                    <span class="details">Barangay</span>
                    <select name="barangay" id="barangay" required value="<?php if(isset($_POST['barangay'])) { echo $_POST['barangay']; } ?>">
                        <option value="">Select Barangay</option>
                    </select>
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Street Name</span>
                        <input type="text" name="street_name" placeholder=""  value="<?php if(isset($_POST['street_name'])) { echo $_POST['street_name']; } ?>">
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Building/House No.</span>
                        <input type="text" name="bldg_house_no" placeholder="" value="<?php if(isset($_POST['bldg_house_no'])) { echo $_POST['bldg_house_no']; } ?>">
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
                    <span class="details">Member Type</span>
                    <select name="member_type" id="member_type" required>
                        <option value="Alumni" <?php if(isset($_POST['member_type']) && $_POST['member_type'] == 'Alumni') { echo 'selected'; } ?>>Alumni</option>
                        <option value="Employee" <?php if(isset($_POST['member_type']) && $_POST['member_type'] == 'Employee') { echo 'selected'; } ?>>Employee</option>
                        <option value="Student" <?php if(isset($_POST['member_type']) && $_POST['member_type'] == 'Student') { echo 'selected'; } ?>>Student</option>
                        <option value="None" <?php if(isset($_POST['member_type']) && $_POST['member_type'] == 'None') { echo 'selected'; } ?>>None</option>
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
                        
                    <!--ACCOUNT CREDENTIALS-->
                    <div class="sub-title">Account Credentials</div><br>
                    <div class="user-details">
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" placeholder="" required value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Old Password</span> 
                        <input type="password" id="password" name="password" maxlength="12" placeholder="" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>" >
                        <span id="password-strength"></span>
                        
                    </div>
                        
                    <div class="input-box">
                        <span class="details">Create New Password</span>
                        <input type="password" id="confirm_password" name="confirm_password" maxlength="12" placeholder="">
                    </div>
                    </div>

                    <!--SIGN UP BUTTON-->
                    <div class="button">
                    <input type="submit" name="submit"  value="Save">
                    </div>
                </form>


                </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/signup.js"></script>
<script src="../js/address.js"></script>


</body>
</html>