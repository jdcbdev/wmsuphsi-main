<?php
   require_once '../classes/user.class.php';
    //resume session here to fetch session values
    session_start();
    $page_title = 'Sign Up | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>
<div class="signup">
  <div class="signup-container">

<?php
        if(isset($_POST['username'])&&  isset($_POST['password'] )
        &&  isset($_POST['firstname'] ) &&  isset($_POST['middlename'] )
        &&  isset($_POST['lastname'] ) &&  isset($_POST['suffix'] )
        &&  isset($_POST['email'] ) && isset($_POST['address'] ) && isset($_POST['role'] )
        && isset($_POST['type'] ) &&  isset($_POST['sex'] ))
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
              $user -> role = htmlentities($_POST['type']);
              $user -> sex = htmlentities($_POST['sex']); 

      
              $output= $user -> login();
      
              if ($output) {
                  // CREATE -- COLUMN "firstname" "lastname" "role"
                  $_SESSION['logged-in'] = $output['user_name'];
                  $_SESSION['fullname'] = $output['firstname'] . ' '.$output['middlename'] . ' ' . $output['lastname'] . ' ' .
                  $output['suffix'] = $output['suffix'];
                  $_SESSION['user_role'] = $output['role'];
                  $_SESSION['email'] = $output['email'];
                  $_SESSION['address'] = $output['address'];
                  $_SESSION['role'] = $output['role'];
                  $_SESSION['type'] = $output['type'];
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
    <div class="title">Sign Up Form</div>
    
    <div class="content">

    <!--PERSONAL INFORMATION-->
    <div class="sub-title">Personal Information</div>
      <form action="login.php">

        <div class="user-details">

          <div class="input-box">
            <span class="details">Firstname</span>
            <input type="text" placeholder="" id="firstname" name="firstname" placeholder="Enter firstname" required tabindex="1"> 
          </div>

          <div class="input-box">
            <span class="details-opt">Middlename</span>
            <input type="text"  id="firstname" name="middlename" placeholder="Enter middlename" required tabindex="2">
          </div>

          <div class="input-box">
            <span class="details">Lastname</span>
            <input type="text"  id="firstname" name="lastname" placeholder="Enter lastname" required tabindex="3">
          </div>

          <div class="input-box">
            <span class="details-opt">Suffix Name</span>
            <input type="text"  id="suffix" name="lastname" placeholder="Enter lastname" required tabindex="4">
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text"  id="email" name="email" placeholder="Enter email" required tabindex="4">
          </div>
          
          <div class="input-box">
            <span class="details">Complete Address</span>
            <input type="text"   id="Complete Address" name="Complete Address" placeholder="Complete Address" required tabindex="5">
          </div>

          <div class="input-box">
          <span class="details">Role</span>
          <select name="role" id="role" required>
            <option value="None">--Select--</option>
            <option value="SuperAdmin" >Super Admin</option>
            <option value="Admin">Admin</option>
            <option value="Users">Users</option>
          </select>
          
          <div class="input-box">
            <span class="details">Contact No.</span>
            <input type="text" id="Contact No." name="Contact No." placeholder="Enter Contact No." required tabindex="7">
          </div>

          <div class="input-box">
          <span class="details">Sex</span>
          <select name="sex" id="sex" required>
            <option value="None">--Select--</option>
            <option value="Male" >Male</option>
            <option value="Female">Female</option>
          </select>
          </div>
        </div>

        <!--WMSU TYPE -->
          <div class="sub-title">WMSU Status <span> (Please Select all that Apply.)</span>
         
          </div><br>
          <div class="user-details">
          <div class="status-container">

          <label class="wmsu-status">WMSU Alumni
            <input type="checkbox" checked="checked" >
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
        </div>




           <!--ACCOUNT CREDENTIALS-->
          <div class="sub-title">Account Credentials</div><br>
          <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="">
          </div>
        </div>


        
         <!--SIGN UP BUTTON-->
        <div class="button">
          <input type="submit"action="signup.php" method="post" value="Sign Up">
        </div>
        <div class="have-account">
        <p>ALREADY HAVE AN ACCOUNT?<span> <a href="login.php">LOG IN</a></span></p>
        </div>
      </form>
    </div>
  </div>


