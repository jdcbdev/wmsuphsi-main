<?php

    $page_title = 'Profile   | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../classes/user.class.php';



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



<?php
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

<section class="user-profile">
<link rel="stylesheet" href="../css/user.css">
<div class="content">
            <form action="" method="post" enctype="multipart/form-data">

            
                <div class="user-details">
                                    
                    <div class="input-box">
                        <span class="details">Firstname</span>
                        <input type="text" name="firstname" placeholder=""  value="<?php echo $_SESSION['firstname']; ?>" readonly>
                    </div>

        
                    <div class="input-box">
                        <span class="details-opt">Middlename</span>
                        <input type="text" name="middlename" placeholder="" value="<?php echo $_SESSION['middlename']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details">Lastname</span>
                        <input type="text" name="lastname"  placeholder=""  value="<?php echo $_SESSION['lastname']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Suffix</span>
                        <input type="text" name="suffix" placeholder="" value="<?php echo $_SESSION['suffix']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder=""  value="<?php echo $_SESSION['email']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details">Sex</span>
                        <input type="text" name="sex" placeholder=""  value="<?php echo $_SESSION['sex']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details">Contact No.</span>
                        <input type="text" name="contact_number" id="contact_number" placeholder="" required value="<?php echo $_SESSION['contact_number']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details">Province</span>
                        <input type="text" name="province" placeholder=""  value="<?php echo $_SESSION['province']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details">City/Municipality</span>
                        <input type="text" name="city" placeholder=""  value="<?php echo $_SESSION['city']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details">Barangay</span>
                        <input type="text" name="barangay" placeholder=""  value="<?php echo $_SESSION['barangay']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Street Name</span>
                        <input type="text" name="street_name" readonly placeholder="" value="<?php echo $street_name; ?>">
                    </div>

                    <div class="input-box">
                        <span class="details-opt">Building/House No.</span>
                        <input type="text" name="bldg_house_no" readonly placeholder="" value="<?php echo $_SESSION['bldg_house_no']; ?>">
                    </div>
                    </div>

                    <div class="sub-title" style="font-size: 18px;">Account Credentials</div><br>
                    <div class="user-details">

                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" id="username" placeholder="" required value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>

                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" id="password" placeholder="" required value="<?php echo $_SESSION['password']; ?>" readonly>
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

                    
                    <!--SIGN UP BUTTON
                    <div class="button">
                    <input type="submit" name="submit"  value="Save">
                    </div>-->

                </form>
</div>
</section>














<?php
    require_once '../includes/footer.php';

?>
