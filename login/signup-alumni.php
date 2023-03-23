<?php
   require_once '../classes/user.class.php';
   require_once '../tools/functions.php';
    //resume session here to fetch session values
    session_start();
    $page_title = 'Sign Up | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>


<?php 

        if(isset($_POST['submit'])) {
          //Sanitizing the inputs of the users. Mandatory to prevent injections!
            
          $user = new Users;
          $user -> firstname = htmlentities($_POST['firstname']);
          $user -> middlename = htmlentities($_POST['middlename']);
          $user -> lastname = htmlentities($_POST['lastname']);
          $user -> suffix = htmlentities($_POST['suffix']);
          $user -> sex = htmlentities($_POST['sex']);
          $user -> email = htmlentities($_POST['email']);
          $user -> contact_number = htmlentities($_POST['contact_number']); 
          $user -> province = htmlentities($_POST['province']); 
          $user -> city = htmlentities($_POST['city']); 
          $user -> barangay = htmlentities($_POST['barangay']); 
          $user -> street_name = htmlentities($_POST['street_name']); 
          $user -> bldg_house_no = htmlentities($_POST['bldg_house_no']); 
          $user -> username = htmlentities($_POST['username']); 
          $user -> password = htmlentities($_POST['password']);
          $user -> member_type = htmlentities($_POST['member_type']);

          $user -> verify_one = $_FILES['verify_one']['name'];
          $user -> tempname_one = $_FILES['verify_one']['tmp_name'];
          $user -> folder_one = "../uploads/" . $user -> verify_one;

          $user -> verify_two = $_FILES['verify_two']['name'];
          $user -> tempname_two = $_FILES['verify_two']['tmp_name'];
          $user -> folder_two = "../uploads/" . $user -> verify_two;

          if (move_uploaded_file($user -> tempname_one, $user -> folder_one) && move_uploaded_file($user -> tempname_two, $user -> folder_two)) {
                if(validate_signup_user($_POST)){
                  if($user -> signup()){
                    //redirect user to program page after saving
                    header('location: login.php');
                }
            }
              
          }
      }
?>

<div class="signup">
  <div class="signup-container">

    <div class="title">Sign up form for WMSU alumni</div>
    
    <div class="content">

    <!--PERSONAL INFORMATION-->
    <div class="sub-title">Personal Information</div>
      <form action="signup-alumni.php" method="post" enctype="multipart/form-data">

        <div class="user-details">

        <input type="hidden" id="member_type" name="member_type" value="Alumni">

          <div class="input-box">
            <span class="details">Firstname</span>
            <input type="text" name="firstname" placeholder="" required> 
          </div>

          <div class="input-box">
            <span class="details-opt">Middlename</span>
            <input type="text" name="middlename" placeholder="">
          </div>

          <div class="input-box">
            <span class="details">Lastname</span>
            <input type="text" name="lastname"  placeholder="" required>
          </div>

          <div class="input-box">
            <span class="details-opt">Suffix</span>
            <input type="text" name="suffix" placeholder="">
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="" required>
          </div>

          <div class="input-box">
          <span class="details">Sex</span>
          <select name="sex" id="sex" required>
            <option value="Male" >Male</option>
            <option value="Female">Female</option>
          </select>
          </div>

          <div class="input-box">
            <span class="details">Contact No.</span>
            <input type="text" name="contact_number" id="contact_number" placeholder="" required>
          </div>

          <div class="input-box">
          <span class="details">Province</span>
          <select name="province" id="province" required>
            <option value="">Select Province</option>
            <option value="City of Isabela">City of Isabela</option>
            <option value="Zamboanga del Norte">Zamboanga del Norte</option>
            <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
            <option value="Zamboanga del Sur">Zamboanga del Sur</option>
          </select>
          </div>

          <div class="input-box">
          <span class="details">City/Municipality</span>
          <select name="city" id="city" disabled required>
            <option value="">Select City/Municipality</option>
          </select>
          </div>

          <div class="input-box">
          <span class="details">Barangay</span>
          <select name="barangay" id="barangay" disabled required>
            <option value="">Select Barangay</option>
          </select>
          </div>

          <div class="input-box">
            <span class="details-opt">Street Name</span>
            <input type="text" name="street_name" placeholder="">
          </div>

          <div class="input-box">
            <span class="details-opt">Building/House No.</span>
            <input type="text" name="bldg_house_no" placeholder="">
          </div>
        </div>

        <div class="sub-title">Upload Valid ID (Front)</div><br>
        <div class="input-group">
          <input type="file" name="verify_one" id="verify_one" accept="image/*" onchange="showDisplayOne(event)" required>
        </div>

        <label for="file"></label>
        <div class="preview">
          <img id="preview-one">
        </div>

        <div class="sub-title">Upload Valid ID (Back)</div><br>
        <div class="input-group">
          <input type="file" name="verify_two" id="verify_two" accept="image/*"  onchange="showDisplayTwo(event)" required>
        </div>

        <label for="file"></label>
        <div class="preview">
          <img id="preview-two">
        </div>
            
           <!--ACCOUNT CREDENTIALS-->
          <div class="sub-title">Account Credentials</div><br>
          <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span> 
            <input type="password" id="password" name="password" maxlength="12" placeholder="">
            <span id="password-strength"></span>
            
          </div>
            
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" id="confirm_password" name="confirm_password" maxlength="12" placeholder="">
          </div>
        </div>

        
         <!--SIGN UP BUTTON-->
        <div class="button">
          <input type="submit" name="submit"  value="Sign Up">
        </div>
        <div class="have-account">
        <p>ALREADY HAVE AN ACCOUNT?<span> <a href="login.php">LOG IN</a></span></p>
        </div>
      </form>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/signup.js"></script>
<script src="../js/address.js"></script>
