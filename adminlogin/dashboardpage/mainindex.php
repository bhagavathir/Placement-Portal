<?php
    // require_once 'dbconnect.php';
    // var_dump(Database::$conn);
    
    session_start();
    if(!isset($_SESSION['admin'])){
        header('Location:adminlogin.php');
    }
    // var_dump($_SESSION);
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
    require_once 'changepass.php';
    
?>

</div>
</body>
</html>