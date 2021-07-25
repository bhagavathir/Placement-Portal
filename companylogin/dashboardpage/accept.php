<?php
include "dbconnect.php";
if(isset($_GET['sid']))
{	
    print_r($_GET);
    $stuid = $_GET['sid'];
    $jobid = $_GET['jid'];
    $y='y';
    $n='n';
    $sql="UPDATE studentdetails SET Status='$y' WHERE StudentId='$stuid'";
    $sqll="UPDATE jobappl SET Status='$y' WHERE studentid='$stuid' and JobId='$jobid'";
    $dele="DELETE FROM `jobappl` WHERE studentid='$stuid' and status='$n'";
    // $sqlll="DELETE jobappl WHERE studentid='$stuid'";
    // $query=mysqli_query(Database::$conn,$sql);
    
    if(mysqli_query(Database::$conn,$sqll))
    {
        if(mysqli_query(Database::$conn,$sql))
        {
            if(mysqli_query(Database::$conn,$dele)){
                echo "<script>alert('Updated successfully.');</script>";
                echo "<script>location.replace('mainindex.php');</script>";
            }
        }
        // echo "<script>alert('Updated successfully.');</script>";
        // echo "<script>location.replace('mainindex.php');</script>";
    }
    else{
        echo mysqli_error(Database::$conn);
    }
}

?>