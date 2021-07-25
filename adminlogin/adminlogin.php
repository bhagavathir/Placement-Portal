<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <?php include 'links.php' ?>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"><php? echo time() ?> -->
    <link rel="stylesheet" type="text/css" href="styles.css"><php? echo time() ?>
    
</head>
<body>
<header>
    <!--styling using bootstrap classes -->
    <div class="container center-div shadow ">
        <div class="heading text-center text-white mb-5">Admin Login Page</div>
        <div class="container row d-flex flex-row justify-content-center mb-5">
           <div class="admin-form shadow p-2">
                <form action="logincheck.php" method="post">
                   <div class="form-group">
                        <label>Admin User Id</label>
                        <input type="text" name="admin" class="form-control"placeholder="Enter admin id" autocomplete="off">
                   </div>

                   <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off">
                   </div>
                   <input type="submit" class="btn btn-success" name="submit" style="background-color: #dc3545;border-color: #dc3545;">
                </form>
           </div> 
        </div>
    </div>
</header>  
</body>
</html>
 