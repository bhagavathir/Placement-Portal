<?php
include "dbconnect.php";
if(isset($_GET['sid']))
{	
    print_r($_GET);
        $jobid =$_GET['jid'];
        $stuid = $_GET['sid'];
        
        $query=mysqli_query(Database::$conn,"SELECT status from studentdetails where studentid='$stuid'");
        $row= mysqli_fetch_assoc($query);
        if($row['status']=='b'){
            echo "<script>alert('Account has been removed, please contact admin');</script>";
            echo "<script>location.replace('mainindex.php');</script>";
        }
        else if($row['status']=='n')
        {
            $query1=mysqli_query(Database::$conn,"SELECT vacancies from jobdetails where jobid='$jobid'");
            $row= mysqli_fetch_assoc($query1);
            if($row['vacancies'])
            {
                $query1=mysqli_query(Database::$conn,"SELECT * from jobappl where jobid='$jobid' and studentid='$stuid'");
                $row= mysqli_fetch_assoc($query1);
                if(!$row)
                {
                    if(!mysqli_query(Database::$conn,"INSERT INTO `jobappl`(`Status`, `studentid`, `JobId`) VALUES ('n','$stuid','$jobid')"))
                    {
                        echo mysqli_error(Database::$conn);
                    }
                    else
                    {
                        echo "<script>alert('Record added successfully.');</script>";
                        echo "<script>location.replace('mainindex.php');</script>";
                        // header('location: mainindex.php');
                    }

                }
                else
                {
                    echo "<script>alert('Application submitted previously');</script>";
                    echo "<script>location.replace('mainindex.php');</script>";
                }

            }
            else
            {
                echo "<script>alert('No Vacancies Left, Applications Closed');</script>";
                echo "<script>location.replace('mainindex.php');</script>";
            }
        }
        else
        {
                echo "<script>alert('Already Placed, cannot apply');</script>";
                echo "<script>location.replace('mainindex.php');</script>";
        }
       
        
}


?>