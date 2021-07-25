<?php
function apply_transaction($id,$name)
{
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $conn=new mysqli('localhost','root','','placement_portal');
  $conn->set_charset('utf8mb4');
  $conn->begin_transaction();
  try{
      $query=$conn->query("select * from companylogin where companyid='$id'");
      $row=$query->fetch_assoc();
      if(!$row)
      {
        $query=$conn->query("UPDATE notifications set unread='0' where id='$id'");
        if($query)
        {
            $sql = "INSERT INTO companylogin (CompanyId, Pwd)
                        VALUES ('$id','password')";

            if ($conn->query($sql) === TRUE) {
                $conn->commit();
                echo "<script>alert('New record created successfully');</script>";
                echo "<script>location.replace('mainindex.php');</script>";
            } else {
                echo "<script>alert('Error creating company');</script>";
                echo "<script>location.replace('mainindex.php');</script>";
            }

        }
        else{
            echo "<script>alert('Error creating company');</script>";
            echo "<script>location.replace('mainindex.php');</script>";
        }
    }
    else{
        echo "<script>alert('Company already exists');</script>";
        echo "<script>location.replace('mainindex.php');</script>";
    }
}catch(mysqli_sql_execption $exception){
      $mysqli->rollback();
      throw $exception;
    }
}


if($_GET['addcomp']){
    $name=$_GET['name'];
    $id=$_GET['id'];
    apply_transaction($id,$name);

}

?>





