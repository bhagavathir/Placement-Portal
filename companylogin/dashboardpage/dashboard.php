<?php require_once 'dbconnect.php' ?>
<div id="Dashboard" class="portion" > 
<!-- style="display:none"> -->
    <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM studentlogin";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Total Students</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-users"></i>
                    </div>
                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM jobappl inner join jobdetails on jobappl.JobId = jobdetails.JobId
                            where jobdetails.CompanyId ='" . $_SESSION['username'] . "'";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Students applied</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM jobappl inner join jobdetails on jobappl.JobId = jobdetails.JobId
                            where jobdetails.CompanyId ='" . $_SESSION['username'] . "' and jobappl.Status='y'";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Students Placed</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-id-card"></i>
                    </div>
                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            $sql = "SELECT * FROM jobdetails where jobdetails.CompanyId ='" . $_SESSION['username'] . "'";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            echo($rowCount);
                        ?>
                        </div>
                        <div class="cardName">Total Jobs</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-box-open"></i>
                    </div>
                    
                </div>
            </div>

            <div class="details">
                <div class="recent">
                    <div class="cardHeader">
                        <h2>Applications</h2>
                        <a href="#" onclick="openTab(event, 'Students')" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Job ID</td>
                                <td>Student ID</td>
                                <td>Name</td>
                                <td>Status</td>
                                </tr>
                        </thead>

                        <?php                             
                            // var_dump($_SESSION);

                            $sql = "SELECT jobdetails.JobId, jobappl.studentid, studentdetails.FirstName, jobappl.Status
                            FROM jobappl inner join studentdetails on jobappl.studentid=studentdetails.StudentId
                            inner join jobdetails on jobdetails.JobId=jobappl.JobId
                            WHERE jobdetails.CompanyId='" . $_SESSION['username'] . "'";
                            $result = mysqli_query(Database::$conn,$sql);
                            // echo(mysqlia_error($sql));
                            $rowCount = mysqli_num_rows($result);
                            //echo($rowCount);
                            if($rowCount > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr><td>".$row['JobId']."</td><td>".$row['studentid']."</td><td>".$row['FirstName']."</td>";
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
                    </table>
                </div>

                <div class="recentComm">
                    <div class="cardHeader">
                        <h2>Jobs</h2>
                    </div>
                    <table>
                        <thead>
                                <tr>
                                    <td>Job Id</td>
                                    <td>Vacancy Count</td>
                                </tr>
                        </thead>
                        <?php
                            $sql = "SELECT * FROM jobdetails WHERE jobdetails.CompanyId='" . $_SESSION['username'] . "'";
                            $result = mysqli_query(Database::$conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                                // echo($rowCount);
                            if($rowCount > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                    if($row['Vacancies']>0)
                                        echo "<tr><td>".$row['JobId']."</td><td>".$row['Vacancies']."</td></tr>";
                                }
                            }
                        ?>

                        <!-- <tbody>
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
                        </tbody> -->
                    </table>
                </div>

            </div>



</div>

            
            
           