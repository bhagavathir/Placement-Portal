<style>
#Companies .heading{
    width:100%;
    line-height: 80px;
    font-size: 1.5rem;
    font-family: 'Anton', sans-serif;
    color: whitesmoke;
    text-align: center;
}
.formdiv{
    text-align: center;
}
.filterform{
    width:100%;
    
}
.selectopt{
    color: black;
}

label.dropdown {
    /* width:200px; */
    overflow: hidden; 
    height: 50px;     
    position: relative;
    /* display: block;
    border:2px solid blue; */
}
.filterform input[type=text], 
.filterform select {
    /* width: 100%; */
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }

.filterform input[type=submit] {
    background: linear-gradient(135deg,#6F2232, #C3073F);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    /* float: right; */
}
.filterform input[type=submit]:hover {
    background:linear-gradient(-135deg,#6F2232, #C3073F);;
  }
  
select.selectmenu{       
    /* height: 50px;
    padding: 10px;
    border: 0; */
    font-size: 15px;       
    width: 200px;
   -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
label.dropdown:after {
    content: '\f0b0 ';
    font-family: FontAwesome;
    position: absolute;
    right: 5px;
    top: 1px;
    font-size: smaller;
    z-index: 1;
    width: 10%;
    height: 100%;
    pointer-events: none;
    color: #34343a;
}
.filterform .input-text,
.filterform .input-select{
    padding: 10px;
}
.filterform input:focus, 
.filterform select:focus{
    outline: none;
    border-bottom: 3px solid #950740;
}

#Companies .details-table{
    margin: 10px;
    /* padding: 10px; */
    /* margin-top: 10px; */
    border-collapse:collapse;
    box-shadow: 0 0 20px rgba(134, 132, 132, 0.15);
    background: #1A1A1D;
    max-width: 100%;
    font-size: 16px;
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
#Companies .details-table thead tr {
    background-color: #950740;
    color: #ffffff;
    text-align: left;
}

#Companies .details-table thead td{
    padding: 10px 10px;
}
#Companies .details-table tbody td{
    padding: 10px 10px;
}
#Companies .details-table tbody:nth-of-type(even){
    background: black;
}
#Companies .details-table tbody:last-of-type {
    border-bottom: 2px solid #950740;
}
#Companies .details-table tbody:hover{
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
    //include connection.php
    // include'connection.php';
    require_once 'dbconnect.php';
    $sql="select * from (select companyprofile.CompanyName,companyprofile.Email,jobdetails.JobId,
    jobdetails.CompanyId,jobdetails.JobDesc,jobdetails.ApplDeadline,jobdetails.Start,jobdetails.Mode,jobdetails.Salary,jobdetails.City,jobdetails.Vacancies,
    eligibilitycriteria.CGPA,eligibilitycriteria.mark10,eligibilitycriteria.mark12,eligibilitycriteria.GradYear,eligibilitycriteria.Department
    FROM jobdetails 
    INNER JOIN companyprofile ON jobdetails.CompanyId = companyprofile.CompanyId
    INNER JOIN eligibilitycriteria ON jobdetails.JobId =  eligibilitycriteria.JobId)as result";

    if(isset($_POST['search'])){
        // var_dump($_POST);
        $search_term = mysqli_real_escape_string(Database::$conn,$_POST['search_box']);
        $col = mysqli_real_escape_string(Database::$conn,$_POST['column']);
        $sql .= " Where result.$col = '{$search_term}'";      
        //$sql .= " OR jobdetails.$col = '{$search_term}'";
        //$sql .= "ORDER BY jobdetails.ApplDeadline DESC";
        //echo "<br>".$sql;
        
        // print_r(mysqli_fetch_array($query));   
       

    }
    elseif(isset($_POST['reset'])){}
    $query = mysqli_query(Database::$conn,$sql) or die(mysqli_error(Database::$conn));
    
?>

<div id="Companies" class="portion" style="display:none">
<div class="heading">PLACEMENT APPLICATION</div>
    <div class="formdiv">
        <form class="filterform" name="search" method="POST" action="#">
            <div class="input-text">
                <input type="text" name="search_box" value="" placeholder="Enter"/>
			</div>
            <div class="input-select">
                <label class="dropdown">
			<select name="column" style="color:black;" class="selectmenu">
                                <option value="" style="color:black;">Filter</option>
                                <option value="companyid" class="selectopt">Company Id</option>
                                <option value="companyname" class="selectopt">Company Name</option>
                                <option value="mode" class="selectopt">Mode</option>
                                <option value="city" class="selectopt">City</option>
                                <option value="CGPA" class="selectopt">CGPA</option>
                        </select>
                </label>
                <input  type="submit" name="search" value="Search"/>
                <input  type="submit" name="reset" value="Reset"/>
            </div>
            
            
        </form>
    </div>
    <table class="details-table">
            <thead>
            <tr>
                
                <td> JOB ID </td>
                <td> COMPANY NAME </td>
                <td> JOB DESC </td>
                <td> NO. OF VACANCIES </td>
                <td> CGPA Required </td>
                <td> YEAR OF GRADUATION </td>
                <td> DEPARTMENT(s) </td>
                <td> START </td>
                <td> MODE </td>
                <td> SALARY </td>
                <td> CITY NAME </td>
                <td> DEADLINE </td>
                <!-- <td> student ID </td> -->
                <td> APPLY </td> 
                
            </tr>
            </thead>
            <?php 
                // echo "hello";
                
                 while($row = mysqli_fetch_array($query)){

                   
            ?>
        <tbody>
        <tr>
            <!-- <form action="apply.php" method="GET"> -->
                
                <td><?php echo $row['JobId'];?></td>
                <td><?php echo $row['CompanyName'];?></td>
		        <td><?php echo $row['JobDesc'];?></td>
                <td><?php echo $row['Vacancies'];?></td>
                <td><?php echo $row['CGPA'];?></td>
                <td><?php echo $row['GradYear'];?></td>
                <td><?php echo $row['Department'];?></td>
                <td><?php echo $row['Start'];?></td>
                <td><?php echo $row['Mode'];?></td>
                <td><?php echo $row['Salary'];?></td>
                <td><?php echo $row['City'];?></td>
		        <td><?php echo $row['ApplDeadline']."<br>";?></td>
                <!-- <td><input type="text" name="studentId"></td> -->
                <!-- <td><input type="submit" name="submit"><a href="apply.php" style="text-decoration: none;">Click to Apply</a></td> -->
                <td><a href="apply.php?sid=<?php echo $_SESSION['username'];?>&jid=<?php echo $row['JobId'];?>" style="text-decoration:none;">Click To Apply</a></td>
                
        </tr>    
    </tbody>
    
    <?php }?>
    </table>

</div>
