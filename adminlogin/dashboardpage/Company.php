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
    margin: auto;
    /* padding: 10px; */
    /* margin-top: 10px; */
    border-collapse:collapse;
    box-shadow: 0 0 20px rgba(134, 132, 132, 0.15);
    background: #1A1A1D;
    max-width: 100%;
    font-size: 16px;
    /* display: block; */
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
.sectioncomp {
    max-width: var(--sectionWidth);
    margin:  auto;
    width: 97%;
    color: rgb(27, 27, 27);
  }
  
  summary {
    display: block;
    cursor: pointer;
    padding: 10px;
    /* font-family: "Space Mono", monospace; */
    font-size: 22px;
    transition: .3s;
    border-bottom: 2px solid;
    user-select: none;
  }
  
  details > div {
    /* display: flex; */
    flex-wrap: wrap;
    overflow: auto;
    height: 100%;
    user-select: none;
    padding: 0 20px;
    /* font-family: "Karla", sans-serif; */
    line-height: 1.5;
  }
  details > div > p {
      flex: 1;
    }
    
    details[open] > summary {
       color: #950740;
    }
    
    @media (min-width: 768px) {
      details[open] > div > p {
        opacity: 0;
        animation-name: showContent;
        animation-duration: 0.6s;
        animation-delay: 0.2s;
        animation-fill-mode: forwards;
        margin: 0;
        padding-left: 20px;
      }
    
      details[open] > div {
        animation-name: slideDown;
        animation-duration: 0.3s;
        animation-fill-mode: forwards;
      }
  
  @keyframes slideDown {
      from {
        opacity: 0;
        height: 0;
        padding: 0;
      }
    
      to {
        opacity: 1;
        height: var(--contentHeight);
        padding: 20px;
      }
    }
    
    @keyframes showImage {
      from {
        opacity: 0;
        clip-path: inset(50% 0 50% 0);
        transform: scale(0.4);
      }
    
      to {
        opacity: 1;
        clip-path: inset(0 0 0 0);
      }
    }
    
    @keyframes showContent {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
  }
</style>  
<?php
    //include connection.php
    // include'connection.php';
    require_once 'dbconnect.php';
    $sql="select * from companyprofile";

    if(isset($_POST['search'])){
        // var_dump($_POST);
        $search_term = mysqli_real_escape_string(Database::$conn,$_POST['search_box']);
        $col = mysqli_real_escape_string(Database::$conn,$_POST['column']);
        $sql .= " Where companyprofile.$col = '{$search_term}'";      
        //$sql .= " OR jobdetails.$col = '{$search_term}'";
        //$sql .= "ORDER BY jobdetails.ApplDeadline DESC";
        //echo "<br>".$sql;
        
        // print_r(mysqli_fetch_array($query));       
    }
    elseif(isset($_POST['reset'])){}
    $query = mysqli_query(Database::$conn,$sql) or die(mysqli_error(Database::$conn));
    
?>
<div id="Companies" class="portion" >
<section class="sectioncomp">
    <details open>
      <summary>View Companies</summary>
      <div>
      <div class="heading">VIEW COMPANY DETAILS</div>
    <div class="formdiv">
        <form class="filterform" name="search" method="POST" action="#">
            <div class="input-text">
                <input type="text" name="search_box" value="" placeholder="Enter"/>
			</div>
            <div class="input-select">
                <label class="dropdown">
			<select name="column" style="color:black;" class="selectmenu">
                <option value="" style="color:black;">Filter</option>
                <option value="CompanyName" class="selectopt">Company Name</option>
                <option value="City" class="selectopt">City</option>  
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
                <td> COMPANY ID </td>
                <td> COMPANY NAME </td>
                <td> EMAIL ID </td>
                <td> PHONE NO. </td>
                <td> CITY </td>
                <!-- <td> REMOVE </td> -->
           
            </tr>
            </thead>
            <?php 
                // echo "hello";
                 while($row = mysqli_fetch_array($query)){
                    ?>
        <tbody>
        <tr>
                <td><?php echo $row['CompanyId'];?></td>
                <td><?php echo $row['CompanyName'];?></td>
                <td><?php echo $row['Email'];?></td>
				<td><?php echo $row['PhoneNumber'];?></td>
                <td><?php echo $row['City'];?></td>
                <!-- <td><a href="#addcomp=1" style="text-decoration: none;">Delete</a></td> -->
        </tr>    
    </tbody>
    <?php }?>
    </table>
      </div>
    </details>

    <?php
        $stmt="select * from notifications where unread='1' order by time desc ";
        $sqlquery = mysqli_query(Database::$conn,$stmt) or die(mysqli_error(Database::$conn));

    ?>
    <details>
        <br>
      <summary>Add Companies</summary>
      <div>
      <table class="details-table">
            <thead>
            <tr>
                <td> NOTIFICATION ID </td>
                <td> COMPANY NAME </td>
                <td> UNREAD </td>
                <td> TIME </td>
                <td> CREATE COMPANY</td>
            </tr>
            </thead>
            <?php 
                // echo "hello";
                 while($rownotif = mysqli_fetch_array($sqlquery)){
                  // print_r($rownotif);
                    ?>
        <tbody>
        <tr>
                <td><?php echo $rownotif['id'];?></td>
                <td><?php echo $rownotif['companyName'];?></td>
                <td><?php echo $rownotif['unread'];?></td>
                <td><?php echo $rownotif['time'];?></td>
                <td><a href="managecomp.php?addcomp=1&id=<?php echo $rownotif['id'];?>&name=<?php echo $rownotif['companyName'];?>" style="text-decoration: none;">Insert</a></td>
        </tr>    
    </tbody>
    <?php }?>
    </table>
      </div>
    </details>
    
  </section>
</div>
