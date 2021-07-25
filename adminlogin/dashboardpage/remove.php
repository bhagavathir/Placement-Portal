<?php
include "dbconnect.php";
if(isset($_GET['sid']))
{	
    print_r($_GET);
    $stuid = $_GET['sid'];
    $y= 'b';
    $sql="UPDATE studentdetails SET Status='$y' WHERE StudentId='$stuid'";
    // $query=mysqli_query(Database::$conn,$sql);
    
    if(mysqli_query(Database::$conn,$sql))
    {
        // $row= mysqli_fetch_assoc(mysqli_query(Database::$conn,$sql));
        echo"eiofhiurgfr";
        // echo "<script>alert('Updated successfully.');</script>";
        echo "<script>location.replace('mainindex.php');</script>";
    }
    else{
        echo mysqli_error(Database::$conn);
    }
}

?>