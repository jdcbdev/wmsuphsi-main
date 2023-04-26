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
      $user->profile_picture = htmlentities($_POST['profile_picture']);
      $user->background_image = htmlentities($_POST['background_image']);
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
      if($user->editUser()){ 
      //redirect user to user page after saving
      header('location: user-profile.php');
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
      $_POST['member_type'] = $data['member_type'];
    }
  }
  
  $profile_picture = $_POST['profile_picture'];
  $background_image = $_POST['background_image'];
  $verify_one = $_POST['verify_one'];
  $verify_two = $_POST['verify_two'];
  $verify_three = $_POST['verify_three'];
  $verify_four = $_POST['verify_four'];     
  $verify_five = $_POST['verify_five'];
  $verify_six = $_POST['verify_six'];
  $verify_seven = $_POST['verify_seven'];
  $verify_eight = $_POST['verify_eight'];
    

?>
<link rel="stylesheet" href="../css/user.css">

<div class="profile-container">
  <img src="../uploads/<?php echo $background_image; ?>" class="background-image" alt="Background Image">
  <div class="profile-wrapper">
    <img src="../uploads/<?php echo $profile_picture; ?>" class="profile-image" alt="Profile Image">
    <div class="profile-info">
      <h2 class="profile-name"><?php echo $_SESSION['fullname']; ?></h2>
      <!--<p class="profile-description">WMSU Student / WMSU UNESCO Club</p>-->
      <a href="edit-profile.php" class="edit-profile-btn">Edit Profile</a>
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
                        <input type="text" name="lastname"  placeholder=""  value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>" >
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Suffix</span>
                        <input type="text" name="suffix" placeholder="" value="<?php if(isset($_POST['suffix'])) { echo $_POST['suffix']; } ?>" >
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" >
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
                      <img src="../uploads/<?php echo $verify_one; ?>" alt="" style="width: 20%; height: auto; margin-right: 20px;">
                      <img src="../uploads/<?php echo $verify_two; ?>" alt="" style="width: 20%; height: auto; ">
                    </div>
                    </div>

                    <div class="image-container">
                    <p>Alumni ID</p>
                    <div style="display: flex;">
                      <img src="../uploads/<?php echo $verify_three; ?>" alt="" style="width: 20%; height: auto; margin-right: 20px;">
                      <img src="../uploads/<?php echo $verify_four; ?>" alt="" style="width: 20%; height: auto; ">
                    </div>
                    </div>

                    <div class="image-container">
                    <p>Employee ID</p>
                    <div style="display: flex;">
                      <img src="../uploads/<?php echo $verify_five; ?>" alt="" style="width: 20%; height: auto; margin-right: 20px;">
                      <img src="../uploads/<?php echo $verify_six; ?>" alt="" style="width: 20%; height: auto; ">
                    </div>
                    </div>

                    <div class="image-container">
                    <p>Not-Affiliated (Outside WMSU) ID</p>
                    <div style="display: flex;">
                      <img src="../uploads/<?php echo $verify_seven; ?>" alt="" style="width: 20%; height: auto; margin-right: 20px;">
                      <img src="../uploads/<?php echo $verify_eight; ?>" alt="" style="width: 20%; height: auto; ">
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
