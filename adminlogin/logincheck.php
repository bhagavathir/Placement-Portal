<?php
    //start the session
    session_start();
    $connection = mysqli_connect('localhost','root');
    
    $db = mysqli_select_db($connection,'placement_portal');
    if(isset($_POST['submit'])){
        $user = $_POST['admin'];
        $pass = $_POST['password'];
        
        $sql ="SELECT * from adminlogin where AdminId = '$user' AND Pwd = '$pass'";
        $query = mysqli_query($connection,$sql);
        $row = mysqli_num_rows($query);
            
        if($row == 1){
                echo "Admin Successfully logged in<br>";
                $_SESSION['admin'] = $user;
                header('Location:dashboardpage/mainindex.php');
            }
            else{
                echo "Log in failed<br>";
                header('Location:adminlogin.php');
            }
        
    }

?>