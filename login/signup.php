<?php
   require_once '../classes/user.class.php';
    //resume session here to fetch session values
    session_start();
    $page_title = 'Sign Up | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>

<?php
        if(isset($_POST['username'])&&  isset($_POST['password'] )
        &&  isset($_POST['firstname'] ) &&  isset($_POST['middlename'] )
        &&  isset($_POST['lastname'] ) &&  isset($_POST['suffix'] )
        &&  isset($_POST['email'] ) && isset($_POST['address'] )
        &&  isset($_POST['sex'] ))
        {
          //Sanitizing the inputs of the users. Mandatory to prevent injections!
            
              $user= new users;
              $user -> email = htmlentities($_POST['username']); 
              $user -> password = htmlentities($_POST['password']);
              $user -> firstname = htmlentities($_POST['firstname']);
              $user -> middlename = htmlentities($_POST['middlename']);
              $user -> lastname = htmlentities($_POST['lastname']);
              $user -> suffix = htmlentities($_POST['suffix ']);
              $user -> email = htmlentities($_POST['email']);
              $user -> address = htmlentities($_POST['address']);
              $user -> role = htmlentities($_POST['role']);
              $user -> sex = htmlentities($_POST['sex']); 
      
              $output= $user -> login();
      
              if ($output) {
                  // CREATE -- COLUMN "firstname" "lastname" "role"
                  $_SESSION['logged-in'] = $output['user_name'];
                  $_SESSION['fullname'] = $output['firstname'] . ' '.$output['middlename'] . ' ' . $output['lastname'] . ' ' .
                  $output['suffix'];
                  $_SESSION['user_role'] = $output['role'];
                  $_SESSION['email'] = $output['email'];
                  $_SESSION['address'] = $output['address'];
                  $_SESSION['sex'] = $output['sex'];
      
                  //display the appropriate dashboard page for user
                      if($output['role'] == 'admin'){
                          header('location: ../admin/dashboard.php');
                      }else{
                          header('location: ../user/user-profile.php');
                          header('location: ../admin/dashboard1.php');
                      }
                  }
            
              
              //set the error message if account is invalid
              $error = 'Incorrect Account Credentials! Try again.';
        }
  ?>
?>

  <div class="signup-container">

<div class="signup-container">
    <div class="title">Sign Up Form</div>
    <div class="content">

    <!--PERSONAL INFORMATION-->
    <div class="sub-title">Personal Information</div>
      <form action="login.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Firstname</span>
            <input type="text" placeholder="" required> 
          </div>
          <div class="input-box">
            <span class="details" id="middlename">Middlename</span>
            <input type="text" placeholder="">
          </div>
          <div class="input-box">
            <span class="details">Lastname</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details" id="middlename">Extension Name</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Street Address</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Barangay</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">City/town</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Country</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Contact number</span>
            <input type="text" placeholder="" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>

        <!--WMSU STATUS-->
          <div class="sub-title">WMSU Status (Optional) </div><br>
          <p style="COLOR: red;margin-bottom: 10px;">Please skip this part if it does not apply to you!
          </p>
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
          <label class="wmsu-status">WMSU Youth Peace Mediators - UNESCO Club 
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <label class="wmsu-status">WMSU Biosafety and Biosecurity Committee
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>


           <!--ACCOUNT CREDENTIALS-->
          <div class="sub-title">Account Credentials</div><br>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">New Password</span>
            <input type="password" placeholder="">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="" required>
          </div>
        </div>
        
         <!--SIGN UP BUTTON-->
        <div class="button">
          <input type="submit" value="Sign Up">
        </div>
        <div class="have-account">
        <p>ALREADY HAVE AN ACCOUNT?<span> <a href="login.php">LOG IN</a></span></p>
        </div>
        
      </form>
    </div>
  </div>
  </section>

