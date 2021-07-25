<?php
require_once 'dbconnect.php';
function insert($id, $email, $fname, $lname, $dob,$phno, $study, $college, $gender)
{
    // var_dump(Database::$conn);
    $stmt = Database::$conn->prepare("INSERT INTO studentdetails 
            (StudentId, FirstName, LastName, EmailId,DoB,MobileNumber,UG,College,Gender) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss",$id,$fname, $lname,$email, $dob,$phno, $study, $college, $gender);
    $res= $stmt->execute();
    if(!$res)
        echo("Error: ".$stmt->error);
    return $res;
}




if (isset($_POST['ressub'])) { // if save button on the form is clicked
    // name of the uploaded file
    //var_dump($_POST);
    $sid=$_POST['studentid'];
    // $rid=$_POST['rno'];
    $dept=$_POST['dept'];
    $gradyear=$_POST['gradyear'];
    $gpa=$_POST['gpa'];
    $mark12=$_POST['mark12'];
    $mark10=$_POST['mark10'];
    $filename = $_FILES['resumefile']['name'];

    
    $destination = 'uploads/' . $filename;

    
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['resumefile']['tmp_name'];
    $size = $_FILES['resumefile']['size'];

    if (!in_array($extension, ['pdf'])) {
        echo "You file extension must be .pdf ";
    } elseif ($_FILES['resumefile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) 
        {
            $res=mysqli_query(Database::$conn,"select * from studentresume where StudentId='".$sid."'");
            echo mysqli_error(Database::$conn);
            $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
            if($row)
            {
                $stmt = Database::$conn->prepare("UPDATE studentresume set
                cgpa =? ,mark12=?,mark10=?,department=?,gradyear=?,filename=?,file=? where StudentId=?
                    ");
                $stmt->bind_param("ssssssss",$gpa,$mark12,$mark10,$dept,$gradyear,$filename,$file,$sid);
                $rest= $stmt->execute();
                if(!$rest){
                    echo("Error: ".$stmt->error);}
                else
                {
                    $message="Success";
                    echo "<script>alert('Updated Successfully');</script>";
                    echo "<script>location.replace('../dashboard/mainindex.php');</script>";
                }
            }
            else
            {
                $stmt = Database::$conn->prepare("INSERT INTO studentresume 
                (studentid,cgpa,mark12,mark10,department,gradyear,filename,file) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssss", $sid,$gpa,$mark12,$mark10,$dept,$gradyear,$filename,$file);
                $res= $stmt->execute();
                if(!$res)
                    echo("Error: ".$stmt->error);
                else
                    echo "<script>alert('Resume upload success')</script>";
                    echo "<script>location.replace('../dashboard/mainindex.php');</script>";
            }
        }
    }
}








// var_dump($_POST['submit']);
if(isset($_POST['submit']))
{
    // echo "hello";
    // var_dump($_POST);
    $id=$_POST['studentid'];
    $email=$_POST['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dob=$_POST['dob'];
    $phno=$_POST['phno'];
    $gender=$_POST['gender'];
    $study=$_POST['study'];
    $college=$_POST['college'];

    $sql=insert($id, $email, $fname, $lname, $dob,$phno, $study, $college, $gender);
    if($sql)
    {
        echo "<script>alert('Data inserted');</script>";
        echo "<script>location.replace('../dashboard/mainindex.php');</script>";
    }
    else
    {
    echo "<script>alert('Data not inserted');</script>";
    }
}
?>