<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="styl.css">
  <?php include 'links.php'?>
</head>
<body style="background-color: black;">
	<!--styling using bootstrap classes -->
    <div class="container center-div shadow ">
        <div class="heading text-center text-white mb-5">Student Login Page</div>
        <div class="container row d-flex flex-row justify-content-center mb-5">
           <div class="admin-form shadow p-2">
                <form action="login.php" method="post">
                   <div class="form-group">
                        <label>Student Username</label>
                        <input type="text" name="username" class="form-control"placeholder="Enter username" autocomplete="off" required>
                   </div>

                   <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off" required>
                   </div>
				   <button type="submit" class="btn btn-danger" name="login_user">Login</button>
				   <p>Not yet a member? <a href="register.php">Sign up</a></p>                   
                </form>
           </div> 
        </div>
    </div>
</body>
</html>

