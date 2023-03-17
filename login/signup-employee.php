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

              $user -> profile_picture = $_FILES['profile_picture']['name'];
              $user -> tempname_picture = $_FILES['profile_picture']['tmp_name'];
              $user -> folder_picture = "../uploads/" . $user -> profile_picture;

              $user -> background_image = $_FILES['background_image']['name'];
              $user -> tempname_background = $_FILES['background_image']['tmp_name'];
              $user -> folder_background = "../uploads/" . $user -> background_image;

              if (move_uploaded_file($user -> tempname_picture, $user -> folder_picture) && move_uploaded_file($user -> tempname_background, $user -> folder_background)) {
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

    <div class="title">Sign up form for WMSU employee</div>
    
    <div class="content">

    <!--PERSONAL INFORMATION-->
    <div class="sub-title">Personal Information</div>
      <form action="signup.php" method="post" enctype="multipart/form-data">

        <div class="user-details">

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

        <div class="sub-title">Upload Employee ID</div><br>
        <div class="input-group">
          <input type="file" name="profile_picture" id="profile_picture" accept="image/*" onchange="showProfile(event)" required>
        </div>

        <label for="file"></label>
        <div class="preview">
          <img id="profile-preview">
        </div>

        <div class="sub-title">Upload a selfie</div><br>
        <div class="input-group">
          <input type="file" name="background_image" id="background_image" accept="image/*" onchange="showBackground(event)" required>
        </div>

        <label for="file"></label>
        <div class="preview">
          <img id="background-preview">
        </div>
            
        <!--WMSU STATUS
          <div class="sub-title">WMSU Status <span> (Please Select all that Apply.)</span>
          </div><br>
          <div class="user-details">
          <div class="status-container">

          <label class="wmsu-status">WMSU Alumni
            <input type="checkbox" checked="checked">
            <span class="checkmark"></span>
          </label>

          <label class="wmsu-status">WMSU Employee
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          
          <label class="wmsu-status">WMSU Student
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>

          <label class="wmsu-status">WMSU Peace and Human Security Institute
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>

          <label class="wmsu-status">WMSU Youth Peace Mediators - UNESCO Club 
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>

          <label class="wmsu-status">WMSU Biosafety and Biosecurity Committee
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
        </div>
        </div>-->




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
