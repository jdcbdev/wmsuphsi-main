<?php

    $page_title = 'Profile   | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../classes/user.class.php';

    //if add user is submitted
    $user = new Users();
    if(isset($_POST['submit'])){
      //sanitize user inputs
      $user->id = $_GET['id'];
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
          // Upload verification photos based on member type
        $user -> verify_one = $_FILES['verify_one']['name'];
        $user -> tempname_one = $_FILES['verify_one']['tmp_name'];
        $user -> folder_one = "../uploads/" . $user -> verify_one;
        $user -> verify_two = $_FILES['verify_two']['name'];
        $user -> tempname_two = $_FILES['verify_two']['tmp_name'];
        $user -> folder_two = "../uploads/" . $user -> verify_two;

        if (
          (empty($user -> verify_one) || move_uploaded_file($user -> tempname_one, $user -> folder_one))
          && (empty($user -> verify_two) || move_uploaded_file($user -> tempname_two, $user -> folder_two))
        ) 

      
      if($user->editUser()){ 
      //redirect user to user page after saving
      //header('location: user-profile.php');
      }
    ob_end_flush(); // end output buffering and send output to browser
  } else {
    if ($user->fetch($_GET['id'])){
      $data = $user->fetch($_GET['id']);
      $_POST['profile_picture'] = $data['profile_picture'];
      $_POST['background_image'] = $data['background_image'];
      $_POST['verify_one'] = $data['verify_one'];
      $_POST['verify_two'] = $data['verify_two'];
      $_POST['verify_three'] = $data['verify_three'];
      $_POST['verify_four'] = $data['verify_four'];
      $_POST['verify_five'] = $data['verify_five'];
      $_POST['verify_six'] = $data['verify_six'];
      $_POST['verify_seven'] = $data['verify_seven'];
      $_POST['verify_eight'] = $data['verify_eight'];
      $_POST['firstname'] = $data['firstname'];
      $_POST['middlename']= $data['middlename'];
      $_POST['lastname']= $data['lastname'];
      $_POST['suffix']= $data['suffix'];
      $_POST['email'] = $data['email'];
      $_POST['sex'] = $data['sex'];
      $_POST['contact_number'] = $data['contact_number'];
      $_POST['province'] = $data['province'];
      $_POST['city'] = $data['city'];
      $_POST['barangay'] = $data['barangay'];
      $_POST['street_name'] = $data['street_name'];
      $_POST['bldg_house_no'] = $data['bldg_house_no'];
      $_POST['username'] = $data['username'];
      $_POST['password'] = $data['password'];
      $_POST['member_type'] = $data['member_type'];
    }
  }

  $profile_picture = $_SESSION['profile_picture'];
  $background_image = $_SESSION['background_image'];
  $verify_one = $_SESSION['verify_one'];
  $verify_two = $_SESSION['verify_two'];
  $verify_three = $_SESSION['verify_three'];
  $verify_four = $_SESSION['verify_four'];     
  $verify_five = $_SESSION['verify_five'];
  $verify_six = $_SESSION['verify_six'];
  $verify_seven = $_SESSION['verify_seven'];
  $verify_eight = $_SESSION['verify_eight'];
  $street_name = $_SESSION['street_name'];
  $email = $_SESSION['email'];
  $username = $_SESSION['username'];
 

?>
<link rel="stylesheet" href="../css/user.css">

<div class="profile-container">
<img src="../uploads/<?php echo $_SESSION['background_image']; ?>" class="background-image" alt="Background Image">
  <div class="profile-wrapper">
    <img src="../uploads/<?php echo $_SESSION['profile_picture']; ?>" class="profile-image" alt="Profile Image">
    <div class="profile-info">
      <h2 class="profile-name"><?php echo $_SESSION['fullname']; ?></h2>
      <!--<p class="profile-description">WMSU Student / WMSU UNESCO Club</p>-->
      <a href="edit-profile.php?id=<?php echo $_SESSION['user_id']; ?>" class="edit-profile-btn">Edit Profile</a>
    </div>
  </div>
</div>

<section>
  <div class="user-work">
    <div class="top-right">
      <a href="user-profile.php"><span>Profile</span></a>
      <a href="eventtimeline.php"><span>Event Timeline</span></a>
    </div>
  </div>
</section>

<section class="user-profile">
<link rel="stylesheet" href="../css/user.css">
<div class="content">
            <form action="edit-profile.php?id=<?php echo $_GET['id']  ?>" method="post" enctype="multipart/form-data">

                <div class="user-details">
                                    
                    <div class="input-box">
                        <span class="details">Firstname</span>
                        <input type="text" name="firstname" placeholder="" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
                    </div>

        
                    <div class="input-box">
                        <span class="details-opt">Middlename</span>
                        <input type="text" name="middlename" placeholder="" value="<?php if(isset($_POST['middlename'])) { echo $_POST['middlename']; } ?>" >
                    </div>

                    <div class="input-box">
                        <span class="details">Lastname</span>
                        <input type="text" name="lastname"  placeholder="" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>" >
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Suffix</span>
                        <input type="text" name="suffix" placeholder="" value="<?php if(isset($_POST['suffix'])) { echo $_POST['suffix']; } ?>" >
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" >
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
                        <input type="text" name="contact_number" id="contact_number" placeholder="" required value="<?php if(isset($_POST['contact_number'])) { echo $_POST['contact_number']; } ?>" >
                    </div>

                    <div class="input-box">
                    <span class="details">Province</span>
                    <select name="province" id="province" required>
                    <option value="City of Isabela" <?php if(isset($_POST['province']) && $_POST['province'] == 'City of Isabela') { echo 'selected'; } ?>>City of Isabela</option>
                        <option value="Zamboanga del Norte" <?php if(isset($_POST['province']) && $_POST['province'] == 'Zamboanga del Norte') { echo 'selected'; } ?>>Zamboanga del Norte</option>
                        <option value="Zamboanga Sibugay" <?php if(isset($_POST['province']) && $_POST['province'] == 'Zamboanga Sibugay') { echo 'selected'; } ?>>Zamboanga Sibugay</option>
                        <option value="Zamboanga del Sur" <?php if(isset($_POST['province']) && $_POST['province'] == 'Zamboanga del Sur') { echo 'selected'; } ?>>Zamboanga del Sur</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <span class="details">City/Municipality</span>
                        <input type="text" name="city" placeholder="" value="<?php if(isset($_POST['city'])) { echo $_POST['city']; } ?>" >
                    </div>

                    <div class="input-box">
                        <span class="details">Barangay</span>
                        <input type="text" name="barangay" placeholder=""  value="<?php if(isset($_POST['barangay'])) { echo $_POST['barangay']; } ?>" >
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Street Name</span>
                        <input type="text" name="street_name"  placeholder="" value="<?php if(isset($_POST['street_name'])) { echo $_POST['street_name']; } ?>">
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Building/House No.</span>
                        <input type="text" name="bldg_house_no"  placeholder="" value="<?php if(isset($_POST['bldg_house_no'])) { echo $_POST['bldg_house_no']; } ?>">
                    </div>
                    </div>

                    <div class="sub-title" style="font-size: 18px;">Account Credentials</div><br>
                    <div class="user-details">

                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" id="username" placeholder="" required value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>" >
                    </div>

                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" id="password" placeholder="" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>" >
                    </div>
                    </div>
                    
                    <div class="sub-title" style="font-size: 18px;">Member Types Application</div><br>
                    <div class="input-box">

                    <div class="user-details" style="display: contents;">
    
                    <div class="image-container">
                    <p>Student ID</p>
                    <div style="display: flex;">
                    <input type="file" name="verify_one" id="verify_one" accept="image/*"  onchange="showDisplayOne(event)">
                    <input type="file" name="verify_two" id="verify_two" accept="image/*"  onchange="showDisplayTwo(event)">
                      <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);">
                        <img id="preview-one">
                      </div>
                      <div class="preview" style="width: 30%; margin: auto; box-shadow: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);">
                        <img id="preview-two">
                      </div>
                    </div>
                    </div>

                    <div class="id-upload Student">






                    <div class="image-container">
                    <p>Alumni ID</p>
                    <div style="display: flex;">
                      <img src="../uploads/<?php if(isset($_POST['verify_three'])) { echo $_POST['verify_three']; } ?>" name="verify_three" alt="" style="width: 20%; height: auto; margin-right: 20px;">
                      <img src="../uploads/<?php if(isset($_POST['verify_four'])) { echo $_POST['verify_four']; } ?>" name="verify_four" alt="" style="width: 20%; height: auto; ">
                    </div>
                    </div>

                    <div class="image-container">
                    <p>Employee ID</p>
                    <div style="display: flex;">
                      <img src="../uploads/<?php if(isset($_POST['verify_five'])) { echo $_POST['verify_five']; } ?>" name="verify_five" alt="" style="width: 20%; height: auto; margin-right: 20px;">
                      <img src="../uploads/<?php if(isset($_POST['verify_six'])) { echo $_POST['verify_six']; } ?>" name="verify_six" alt="" style="width: 20%; height: auto; ">
                    </div>
                    </div>

                    <div class="image-container">
                    <p>Not-Affiliated (Outside WMSU) ID</p>
                    <div style="display: flex;">
                      <img src="../uploads/<?php if(isset($_POST['verify_seven'])) { echo $_POST['verify_seven']; } ?>" name="verify_seven" alt="" style="width: 20%; height: auto; margin-right: 20px;">
                      <img src="../uploads/<?php if(isset($_POST['verify_eight'])) { echo $_POST['verify_eight']; } ?>" name="verify_eight" alt="" style="width: 20%; height: auto; ">
                    </div>
                    </div>

                    
                    <!--SIGN UP BUTTON-->
                    <div class="button">
                    <input type="submit" name="submit"  value="Save">
                    </div>

                </form>
</div>
</section>


<?php
    require_once '../includes/footer.php';

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/signup.js"></script>