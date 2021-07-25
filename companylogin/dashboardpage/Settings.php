<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin: auto;
    margin-top: 20px;
    color:whitesmoke;
}
.styled-table thead tr {
    background-color: #950740;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #1A1A1D;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #950740;
}
.styled-table tbody tr:hover{
    background: #4e4e50;
    color: white;
}
</style>
<?php
    require_once 'dbconnect.php';
    $id=$_SESSION['username'];
    //var_dump($_SESSION);
    if(!mysqli_query(Database::$conn,"SELECT * FROM companyprofile where companyid=$id")){
        echo mysqli_error(Database::$conn);
    }
    $result=mysqli_query(Database::$conn,"SELECT * FROM companyprofile where companyid=$id");
?>
<div id="Settings" class="portion" style="display:none">
<table class="styled-table">
    <thead>
    <tr>
        <th>Particular</th>
        <th>Details</th>
    </tr>
    
    </thead>
<?php
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {?>
	    <tr>
            <td>Company ID </td>
            <td><?php echo $row["CompanyId"]; ?></td>
        </tr>
        <tr>
		    <td>Company Name</td>
            <td><?php echo $row["CompanyName"]; ?></td>
        </tr>
        
        <tr>
		    <td>EmailId</td>
            <td><?php echo $row["Email"]; ?></td>
		</tr>
        
        <tr>
		    <td>Contact Number</td>
            <td><?php echo $row["PhoneNumber"]; ?></td>
        </tr>
        <tr>
		    <td>City</td>
            <td><?php echo $row["City"]; ?></td>
        </tr>
        
	    <tr>
            <td>Details</td>
		    <td><button class="pwdbtn"><a href="updatesettings.php?CompanyId=<?php echo $row['CompanyId']; ?>">Update</a></button></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><button class="pwdbtn"><a href="changepass.php?CompanyId=<?php echo $row["CompanyId"]; ?>">Change Password</a></button></td>
        </tr>
			<?php
			
			}
			?>
</table>



</div>