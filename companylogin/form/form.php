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
    <title>Company Form</title>
  </head>
  <body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="formsub.php" method="POST" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Company ID</span>
            <input type="text" name="CompanyId" value="<?php echo $_SESSION['username'];?>" placeholder="Enter your ID" required >
          </div>
          <div class="input-box">
            <span class="details">Company Name</span>
            <input type="text" name="name" placeholder="Enter Company name" required id="fname">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="Email" placeholder="Enter company email" required>
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="PhoneNumber" placeholder="Enter phone number" required>
          </div>
         
          <div class="input-box">
            <span class="details">HQ City</span>
            <input type="text" name="City" placeholder="Enter City where HQ is located" required>
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
