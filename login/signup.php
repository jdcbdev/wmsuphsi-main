<?php
    //resume session here to fetch session values
    session_start();
    $page_title = 'Sign Up | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>
<div class="signup">
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
            <span class="details-opt">Middlename</span>
            <input type="text" placeholder="">
          </div>

          <div class="input-box">
            <span class="details">Lastname</span>
            <input type="text" placeholder="" required>
          </div>

          <div class="input-box">
            <span class="details-opt">Suffix Name</span>
            <input type="text" placeholder="" >
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="" required>
          </div>
          
          <div class="input-box">
            <span class="details">Complete Address</span>
            <input type="text" placeholder="" required>
          </div>
          
          <div class="input-box">
            <span class="details">Contact No.</span>
            <input type="text" placeholder="" required>
          </div>

          <div class="input-box">
          <span class="details">Sex</span>
          <select name="barangay" id="barangay" required>
            <option value="None">--Select--</option>
            <option value="Male" >Male</option>
            <option value="Female">Female</option>
          </select>
          </div>
        </div>

        <!--WMSU STATUS-->
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
          <input type="submit" value="Sign Up">
        </div>
        <div class="have-account">
        <p>ALREADY HAVE AN ACCOUNT?<span> <a href="login.php">LOG IN</a></span></p>
        </div>
      </form>
    </div>
  </div>
</div>

