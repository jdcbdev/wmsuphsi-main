<?php
    //resume session here to fetch session values
    session_start();
    $page_title = 'Sign Up | WMSU - Peace and Human Security Institute';
    require_once '../includes/head.php';
?>

<section class="signup">
<div class="container">
    <div class="title">Sign Up Form</div>
    <div class="sub-title">Personal Information</div>
    <div class="content">
      <form action="#">
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
            <span class="details">Email</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Contact</span>
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
        </div>
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

