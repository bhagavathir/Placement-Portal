<?php
session_start(); 

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../login.php');
}


?>
<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <link href="style.css" rel="stylesheet">
    <title>Student Form</title>
  </head>
  <body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="formsub.php" method="POST" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Student ID</span>
            <input type="text" name="studentid" value="<?php echo $_SESSION['username'];?>" placeholder="Enter your ID" required id="studentid">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" placeholder="Enter your first name" required id="fname">
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" placeholder="Enter your last name" required id="lname">
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date"name="dob" placeholder="DD/MM/YYYY" required id="dob">
          </div>
          
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phno" placeholder="Enter your number" required id="phno">
          </div>
          <div class="input-box">
            <span class="details">Study</span>
            <select id="study" name="study">
              <option value="" disabled selected>Choose One</option>
              <option value="UG">UG</option>
              <option value="PG">PG</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">College</span>
            <input type="text" name="college" placeholder="Enter your College" required id="College">
          </div>
        </div>
        
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <input type="radio" name="gender" id="dot-3" value="other">
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
            <span class="gender">Other</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
