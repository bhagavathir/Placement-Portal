<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }
    // if (isset($_GET['logout'])) {
    //     session_destroy();
    //     unset($_SESSION['username']);
    //     header("location: login.php");
    // }

    // require_once 'dbconnect.php';
    // var_dump(Database::$conn);
    

?>
<?php 
    require_once 'head.php';
    require_once 'panel.php';
 ?>

<div class="main">

<?php         
    require_once 'topbar.php';
    require_once 'dashboard.php';
    require_once 'students.php';
    require_once 'Company.php';
    require_once 'Settings.php';
    require_once 'script.php';

?>

</div>
</body>
</html>