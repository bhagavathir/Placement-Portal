<?php
    // require_once 'dbconnect.php';
    // var_dump(Database::$conn);
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

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
    require_once 'Job.php';
    require_once 'Settings.php';
    require_once 'script.php';
?>

</div>
</body>
</html>