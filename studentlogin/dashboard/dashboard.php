<?php require_once 'dbconnect.php' ?>
<div id="Dashboard" class="portion" > 
<!-- style="display:none"> -->
    <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM companylogin";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Total Companies</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-users"></i>
                    </div>
                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM jobdetails";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Total jobs</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-id-card"></i>
                    </div>                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM jobappl where jobappl.studentid ='" . $_SESSION['username'] . "'";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Jobs Applied to</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-briefcase"></i>
                    </div>                    
                </div>            

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM studentdetails where studentdetails.studentid ='" . $_SESSION['username'] . "'";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            if($rowCount > 0){
                                $row = mysqli_fetch_assoc($result);
                                if($row['Status']=='y'){
                                    echo "Placed";
                                }
                                else if($row['Status']=='n'){
                                    echo "Not Placed";
                                }
                            }
                        ?>
                        </div>
                        <div class="cardName">Status</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-box-open"></i>
                    </div>
                    
                </div>
            </div>

            <div class="details">
                <div class="recent">
                    <div class="cardHeader">
                        <h2>Table</h2>
                        <a href="#" onclick="openTab(event, 'Companies')" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Job ID</td>
                                <td>Company ID</td>
                                <td>Company Name</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <?php                             
                            // var_dump($_SESSION);

                            $sql = "SELECT jobdetails.JobId, jobdetails.CompanyId, companyprofile.CompanyName, jobappl.Status
                            FROM jobdetails inner join companyprofile on jobdetails.CompanyId=companyprofile.CompanyId
                            inner join jobappl on jobdetails.JobId=jobappl.JobId
                            WHERE jobappl.studentid='" . $_SESSION['username'] . "'";
                            $result = mysqli_query(Database::$conn,$sql);
                            // echo(mysqlia_error($sql));
                            $rowCount = mysqli_num_rows($result);
                            //echo($rowCount);
                            if($rowCount > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr><td>".$row['JobId']."</td><td>".$row['CompanyId']."</td><td>".$row['CompanyName']."</td>";
                                    if($row['Status']=='y'){
                                        echo "<td><span class='status placed'>"."Placed"."</span></td>";
                                    }
                                    else if($row['Status']=='n'){
                                        echo "<td><span class='status pending'>"."Not Placed"."</span></td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                        ?>

                        <!-- <tbody>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status placed">placed</span></td>
                            </tr>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status placed">placed</span></td>
                            </tr>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status blacklist">Blacklisted</span></td>
                            </tr>
                            <tr>
                                <td> STUDENT1</td>
                                <td>HEllo</td>
                                <td><span class="status placed">placed</span></td>
                                
                            </tr>
                        </tbody> -->
                    </table>
                </div>

                <!-- <div class="recentComm">
                    <div class="cardHeader">
                        <h2>Side</h2>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="companylogo.jpg" ></div></td>
                                <td><h4>Comapny Name<br> <span>Type</span></spacn></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="companylogo.jpg" ></div></td>
                                <td><h4>Comapny Name<br> <span>Type</span></spacn></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="companylogo.jpg" ></div></td>
                                <td><h4>Comapny Name<br> <span>Type</span></spacn></h4></td>
                            </tr>
                            <tr>
                                <td width="60px"><div class="imgBx"><img src="companylogo.jpg" ></div></td>
                                <td><h4>Comapny Name<br> <span>Type</span></spacn></h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->

            </div>



</div>

            
            
           