<?php
require_once 'dbconnect.php';
function insert($id, $email, $name, $city,$phno)
{
    // var_dump(Database::$conn);
    $stmt = Database::$conn->prepare("INSERT INTO companyprofile 
            (CompanyId, CompanyName, Email,PhoneNumber,City)
            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$id, $name, $email,$phno,$city);
    $res= $stmt->execute();
    echo Database::$conn->error;
    if(!$res)
        echo("Error: ".$stmt->error);
    return $res;
}




if (isset($_POST['ressub'])) { 
    // print_r($_POST);
    $errors=array();
    $cid=$_POST['CompanyId'];
    $jid=$_POST['JobId'];
    $desc=$_POST['desc'];
    $ad=$_POST['deadline'];
    $start=$_POST['Start'];
    $city=$_POST['City'];
    $state=$_POST['State'];
    $mode=$_POST['Mode'];
    $salary=$_POST['Salary'];
    $vac=$_POST['Vacancies'];
    $gradyear=$_POST['GradYear'];
    $gpa=$_POST['gpa'];
    $mark12=$_POST['mark12'];
    $mark10=$_POST['mark10'];
    
    $checkbox1=$_POST['dept'];  
    $chk="";  
    foreach($checkbox1 as $chk1)  
    {  
        if($chk1=="other")
        {
            continue;
        }

        $chk .= $chk1.",";  
    }  
    $chk.= $_POST['otherdept'];

    // var_dump($chk);
    $job_check_query = "SELECT * FROM jobdetails WHERE JobId='$jid' LIMIT 1";
    $result = mysqli_query(Database::$conn, $job_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
        if ($user['JobId'] === $jid) {
            echo "<script>alert('Job ID already taken');</script>";
            echo "<script>location.replace('../dashboardpage/mainindex.php');</script>";
        //   array_push($errors, "JobId already exists");
        }
    }
    // print_r($errors);
    else
    {

    $stmt = Database::$conn->prepare("INSERT INTO jobdetails 
            (CompanyId, JobId, JobDesc, ApplDeadline, Start,Mode, Salary, City, State, Vacancies)
                VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssss",$cid,$jid,$desc,$ad,$start,$mode,$salary,$city, $state,$vac);
            $res= $stmt->execute();
            if(!$res)
                echo("Error: ".$stmt->error);
            else
                echo "<script>alert('Job upload success')</script>";

    $stmt = Database::$conn->prepare("INSERT INTO eligibilitycriteria 
            (JobId, cgpa,mark12,mark10,department,gradyear)
                VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss",$jid,$gpa,$mark12,$mark10,$chk,$gradyear);
            $res= $stmt->execute();
            if(!$res)
                echo("Error: ".$stmt->error);
            else
            {
                echo "<script>alert('Criteria upload success')</script>";
                echo "<script>location.replace('../dashboardpage/mainindex.php');</script>";
            }
    }
}








// var_dump($_POST['submit']);
if(isset($_POST['submit']))
{
    // echo "hello";
    var_dump($_POST);
    $id=$_POST['CompanyId'];
    $email=$_POST['Email'];
    $name=$_POST['name'];
    $city=$_POST['City'];
    $phno=$_POST['PhoneNumber'];
    

    $sql=insert($id, $email, $name, $city,$phno);
    if($sql)
    {
        echo "<script>alert('Data inserted');</script>";
        echo "<script>location.replace('../dashboardpage/mainindex.php');</script>";
    }
    else
    {
    echo "<script>alert('Data not inserted');</script>";
    }
}
?>