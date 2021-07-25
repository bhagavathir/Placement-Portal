<style>
*{
  background: black;
  color: whitesmoke;
}
.topbar{
  width: 100%;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background:linear-gradient(-135deg,#6F2232, #C3073F);
}
.topbar .pagetitle{
    position: relative;
    width:100%;
    text-align:center;
    height: 50px;
    background: transparent;
    font-size: 30px;
    font-weight: 750;
}
.rollno{
  display:flex;
  justify-content: space-between;
  margin:10px;
}

</style>

<?php
// Database Connection 
$conn = new mysqli('localhost', 'root', '', 'placement_portal');
//Check for connection error

$select = "SELECT * FROM `studentresume` where StudentId='".$_GET['id']."'";
$result = $conn->query($select);
while($row = $result->fetch_object()){
  $pdf = $row->filename;
  $path = "../../studentlogin/form/uploads/";
  //$date = $row->created_date;
}


// echo '<h1>Here is the information PDF</h1>';
// //echo '<strong>Created Date : </strong>'.$date;
// echo '<strong>File Name : </strong>'.$pdf;
?>

<div class="topbar">
  <div class="pagetitle">
    <p style="background:transparent; margin: auto;">Placement Portal</p>
  </div>
</div>
<div class="rollno">
<h4 style="display:inline;">Student Resume</h4>
<h4 style="display:inline;">Student ID: <?php echo $_GET['id'];?></h4>
</div>
<br/><br/>
<iframe src="<?php echo $path.$pdf; ?>" width="100%" height="500px">
</iframe>

