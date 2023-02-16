<?php
   require_once '../classes/user.class.php';
    //resume session here to fetch session values
    session_start();
    $page_title = 'Sign Up | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>


<?php 
  print_r($_POST);

        if(isset($_POST['submit'])) {
          //Sanitizing the inputs of the users. Mandatory to prevent injections!
            
              $user= new users;
              $user -> username = htmlentities($_POST['username']); 
              $user -> password = htmlentities($_POST['password']);
              $user -> firstname = htmlentities($_POST['firstname']);
              $user -> middlename = htmlentities($_POST['middlename']);
              $user -> lastname = htmlentities($_POST['lastname']);
              $user -> suffix = htmlentities($_POST['suffix']);
              $user -> email = htmlentities($_POST['email']);
              $user -> address = htmlentities($_POST['CompleteAddress']);
              $user -> role = htmlentities($_POST['role']);
              $user -> type = htmlentities($_POST['phsi-type']);
              $user -> sex = htmlentities($_POST['sex']); 
              $user -> contactNo = htmlentities($_POST['ContactNo']); 


            //  `username`, `user_pass`, `firstname`, `middlename`, `lastname`, `suffix`, `email`, `address`, `role`,
            //   `type`, `sex`, `contactno`

            //   $query->bindParam(':username', $this->username);
            //   $query->bindParam(':user_pass', $this->password);
            //   $query->bindParam(':firstname', $this->firstname);
            //   $query->bindParam(':middlename', $this->middlename);
            //   $query->bindParam(':lastname', $this->lastname);
            //   $query->bindParam(':suffix', $this->suffix);
            //   $query->bindParam(':email', $this->email);
            //   $query->bindParam(':address', $this->address);
            //   $query->bindParam(':role', $this->role);
            //   $query->bindParam(':type', $this->type);
            //   $query->bindParam(':sex', $this->sex);
            //   $query->bindParam(':contactNo', $this->contactNo);

              $output= $user -> signup();
      
              if ($output) {
                  // CREATE -- COLUMN "firstname" "lastname" "role"
                  print_r($output);

                  $userData = $user -> login();

                  if($userData) {
                       $_SESSION['username'] = $userData['username'];
                  $_SESSION['password'] = $userData['user_pass'];
                  $_SESSION['fullname'] = $userData['firstname'] . ' '.$userData['middlename'] . ' ' . $userData['lastname'] . ' ' .
                  $userData['suffix'] = $userData['suffix'];
                  $_SESSION['user_role'] = $userData['role'];
                  $_SESSION['email'] = $userData['email'];
                  $_SESSION['address'] = $userData['address'];
                  $_SESSION['role'] = $userData['role'];
                  $_SESSION['type'] = $userData['type'];
                  $_SESSION['sex'] = $userData['sex'];
                  if($userData['role'] == 'Admin'){
                    header('location: ../admin/dashboard.php');
                  } else{
                    header('location: ../user/user-profile.php');
                    header('location: ../admin/dashboard1.php');
                }
                  }
               
      
                  //display the appropriate dashboard page for user
             
                  }
              
        }
  
?>


  

<div class="signup-container">
    <div class="title">Sign Up Form</div>
    
    <div class="content">

    <!--PERSONAL INFORMATION-->
    <div class="sub-title">Personal Information</div>
      <form action="signup.php" method="post">

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
            <input type="text"  id="suffix" name="suffix" placeholder="Enter suffix" required tabindex="4">
          </div>
 
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text"  id="email" name="email" placeholder="Enter email" required tabindex="4">
          </div>
          
          <div class="input-box">
            <span class="details">Complete Address</span>
            <input type="text"   id="CompleteAddress" name="CompleteAddress" placeholder="Complete Address" required tabindex="5">
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
            <input type="text" id="ContactNo" name="ContactNo" placeholder="Enter ContactNo." required tabindex="7">
          </div>

          <div class="input-box">
          <span class="details">Sex</span>
          <select name="sex" id="sex" required>
            <option value="None">--Select--</option>
            <option value="1" >Male</option>
            <option value="2">Female</option>
          </select>
          </div>
        </div>

        <!--WMSU TYPE -->
          <div class="sub-title">WMSU Status <span> (Please Select all that Apply.)</span>
         
          </div><br>
          <div class="user-details">
          <div class="status-container">

          <label class="wmsu-status">WMSU Alumni
            <input type="checkbox" name="phsi-type" checked >
            <span class="checkmark"></span>
          </label>

          <label class="wmsu-status">WMSU Employee
            <input type="checkbox" name="phsi-type"> 
            <span class="checkmark"></span>
          </label>
          
          <label class="wmsu-status">WMSU Student
            <input type="checkbox" name="phsi-type">
            <span class="checkmark"></span>
          </label>

          <label class="wmsu-status">WMSU Peace and Human Security Institute
            <input type="checkbox" name="phsi-type">
            <span class="checkmark"></span>
          </label>

          <label class="wmsu-status">WMSU Youth Peace Mediators - UNESCO Club 
            <input type="checkbox" name="phsi-type">
            <span class="checkmark"></span>
          </label>

          <label class="wmsu-status">WMSU Biosafety and Biosecurity Committee
            <input type="checkbox" name="phsi-type">
            <span class="checkmark"></span>
          </label>
        </div>
        </div>




           <!--ACCOUNT CREDENTIALS-->
          <div class="sub-title">Account Credentials</div><br>
          <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="" name="username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="confirm-password" placeholder="">
          </div>
        </div>


        
         <!--SIGN UP BUTTON-->
        <div class="button">
          <input type="submit" action="signup.php" name="submit" id="submit" value="Sign Up">
        </div>
        <div class="have-account">
        <p>ALREADY HAVE AN ACCOUNT?<span> <a href="login.php">LOG IN</a></span></p>
        </div>
      </form>
    </div>
  </div>


