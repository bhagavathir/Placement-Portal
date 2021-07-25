<style>
*{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Kumbh Sans', sans-serif;
    scroll-behavior: smooth;
    /* background:black; */
    color:white;
    /* background-color: black; */
}
body{
    background:black;
}
.table{
    margin-top:100px;
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

  
.details-table{
    margin-top: 50px;
    /* padding: 10px; */
    /* margin-top: 10px; */
    border-collapse:collapse;
    box-shadow: 0 0 20px rgba(134, 132, 132, 0.15);
    background: #1A1A1D;
    max-width: fit-content;
    font-size: 16px;
    display: block;
    overflow-x: auto;
    white-space: nowrap;
    margin:auto auto;
}
.details-table thead tr {
    background-color: #950740;
    color: #ffffff;
    text-align: left;
}

.details-table thead td{
    padding: 10px 10px;
}
.details-table tbody td{
    padding: 10px 10px;
}
.details-table tbody:nth-of-type(even){
    background: black;
}
.details-table tbody:last-of-type {
    border-bottom: 2px solid #950740;
}
.details-table tbody:hover{
    background: #4e4e50;
    color: white;
}
::-webkit-scrollbar {
    width: 2px;
    height: 5px;
}

::-webkit-scrollbar-track {
  border-radius: 5px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
  border-radius: 10px;
  background-color: #C3073F;
  /* outline: 2px solid slategrey; */
}

::-webkit-scrollbar:vertical {
  display: none;
}
</style>
<?php
    require_once '../companylogin/dashboardpage/dbconnect.php';
    $sql="SELECT * from alumni";
    $result=mysqli_query(Database::$conn,$sql);
    if(!$result)
        echo mysqli_error(Database::$conn);
?>

<!DOCTYPE <!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ALUMNI DETAILS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>

        <div class="topbar">
        <div class="pagetitle">
            <p style="background:transparent; margin: auto;">Placement Portal</p>
        </div>
        </div>
        
        <div class="table">
        <table class="details-table">
            <thead>
            <tr>
                
                <td> ALUMNI ID </td>
                <td> FIRST NAME </td>
                <td> LAST NAME </td>
                <td> EMAIL ID </td>
                <td> MOBILE NUMBER </td>
                <td> UG/PG </td>
                
                
            </tr>
            </thead>
            <?php 
                
                 while($row = mysqli_fetch_array($result)){

                   
            ?>
        <tbody>
        <tr>
       
                
                <td><?php echo $row['AlumniId'];?></td>
                <td><?php echo $row['FirstName'];?></td>
		        <td><?php echo $row['LastName'];?></td>
                <td><?php echo $row['Email'];?></td>
                <td><?php echo $row['MobileNumber'];?></td>
                <td><?php echo $row['UG'];?></td>
                
        </tr>    
    </tbody>
    
    <?php }?>
    </table>
    </div>
        
        
    </body>
</html>
