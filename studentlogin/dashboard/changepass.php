<style>

::placeholder{
  color:black;
}
input{
  color:black;
}

.rescontainer{
  max-width: 80%;
  width: 100%;
  
  background-color: #1A1A1D;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px #4e4350;
}
.rescontainer .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
  color: whitesmoke;
}
.rescontainer .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg,#C3073F, #6F2232);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.spandetails{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  color: whitesmoke;
}
.user-details .input-box input,
.user-details .input-box select{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  /* color: black; */
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #950740;
}
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg,#C3073F, #6F2232);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #C3073F, #6F2232);
  }
 @media(max-width: 584px){
 .rescontainer{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .rescontainer .content .category{
    flex-direction: column;
  }
}
</style>

<?php
include_once 'dbconnect.php';

if(isset($_POST['submit'])){
        var_dump($_POST);
        $currPwd = $_POST['pwd'];
        $newPwd = $_POST['NewPwd'];
        $confirmPwd = $_POST['ConfirmPwd'];
        
        if(mysqli_query(Database::$conn,"SELECT * from studentlogin where StudentId='".$_GET['StudentId']."'")){
            if($newPwd == $confirmPwd){
                $pass = md5($newPwd);
                if(mysqli_query(Database::$conn,"update studentlogin set 
                     pwd='".$pass."' WHERE StudentId='" . $_GET['StudentId'] . "'")){
                        $message="Success";
                        echo "<script>alert('Updated Successfully');</script>";
                        echo "<script>location.replace('mainindex.php');</script>";
                }
                else{
                    echo mysqli_error(Database::$conn);
                }
            }
        
        }

    // if(mysqli_query(Database::$conn,"update studentlogin set 
    //     FirstName='".$_POST['FirstName']."', LastName='".$_POST['LastName']."'
    //     , EmailId='".$_POST['EmailId']."', MobileNumber='".$_POST['MobileNumber']."'
    //     , Dob='".$_POST['Dob']."' WHERE StudentId='" . $_GET['StudentId'] . "'"))
    //     {
    //         $message="Success";
    //         echo "<script>alert('Updated Successfully');</script>";
    //         echo "<script>location.replace('mainindex.php');</script>";
    //     }
    //     else{
    //         echo mysqli_error(Database::$conn);
    //     }

}
// var_dump($_GET);
$result = mysqli_query(Database::$conn,"SELECT * FROM studentlogin WHERE StudentId ='" . $_GET['StudentId'] . "'");
$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<!-- style="display:none" -->
<div id="Settings" class="portion" >

<div class="rescontainer">
    <div class="title">Edit Details</div>
    <div class="content">
        <form name="editform" method="post" action="" autocomplete="off">
    <div><?php if(isset($message)) { echo $message; } ?> 
</div>
<div class="user-details">

            <div class="input-box">
                <span class="spandetails">Student ID</span>
                <input type="text" name="StudentId" value="<?php echo $row['StudentId']; ?>" readonly>
            </div>

            <div class="input-box">
                <span class="spandetails">Current Password</span>
                <input type="password" name="pwd">
            </div>

            <div class="input-box">
                <span class="spandetails">New Password</span>
                <input type="password" name="NewPwd">
            </div>

            <div class="input-box">
                <span class="spandetails">Confirm Password</span>
                <input type="password" name="ConfirmPwd">
            </div>

            <div class="button">
                <input type="submit" name="submit" value="Submit" style="width:200px;margin-top: 10px;">
            </div>

</div>
</form>
</div>
</div>
</div>