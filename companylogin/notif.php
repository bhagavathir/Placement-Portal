<!-- <?php include('server.php') ?> -->
<!DOCTYPE html>
<html>
<head>
  <title>Company Registration</title>
  <link rel="stylesheet" type="text/css" href="styl.css">
  <?php include 'links.php'?>
</head>
<body style="background-color: black;">
  <!--styling using bootstrap classes -->
  <div class="container center-div shadow ">
        <div class="heading text-center text-white mb-5">Company Registration Page</div>
        <div class="container row d-flex flex-row justify-content-center mb-5">
           <div class="admin-form shadow p-2">
                <form action="#" method="post">
				<?php include('errors.php'); ?>
                   <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="name" class="form-control"placeholder="Enter Company Name" autocomplete="off" required>
                   </div>
				   <button type="submit" class="btn btn-danger" name="reg_user">Register</button>
				   <p>Already a member? <a href="login.php">Sign in</a></p>                
                </form>
           </div> 
        </div>
    </div>
</body>
</html>


<?php
include_once 'dashboardpage/dbconnect.php';
//var_dump($_POST);
    if(isset($_POST['reg_user']))
    {
        $compname=$_POST['name'];
        if(mysqli_query(Database::$conn,"CALL insert_notif('$compname')")){
            $message="Success";
            echo "<script>alert('Request Submitted Successfully. Please Wait for Admin to authorize account');</script>";
            echo "<script>location.replace('../mainpage/index.html');</script>";
        }
        else{
            echo mysqli_error(Database::$conn);
        }
    
       
    }

?>
