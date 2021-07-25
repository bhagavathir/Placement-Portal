<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="styl.css">
  <?php include 'links.php'?>
</head>
<body style="background-color: black;">
  <!--styling using bootstrap classes -->
  <div class="container center-div shadow ">
        <div class="heading text-center text-white mb-5">Student Registration Page</div>
        <div class="container row d-flex flex-row justify-content-center mb-5">
           <div class="admin-form shadow p-2">
                <form action="register.php" method="post">
				<?php include('errors.php'); ?>
                   <div class="form-group">
                        <label>Student Username</label>
                        <input type="text" name="username" class="form-control"placeholder="Enter username" autocomplete="off" required>
                   </div>

                   <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_1" class="form-control" placeholder="Enter password" autocomplete="off" required>
                   </div>
				   <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_2" class="form-control" placeholder="Confirm password" autocomplete="off" required>
                   </div>
				   <button type="submit" class="btn btn-danger" name="reg_user">Register</button>
				   <p>Already a member? <a href="login.php">Sign in</a></p>                
                </form>
           </div> 
        </div>
    </div>
</body>
</html>




