<div id="Jobs" class="portion" style="display:none">
<div class="rescontainer">
    <div class="title">Job Details</div>
    <div class="content">
      <form action="../form/formsub.php" method="POST" enctype="multipart/form-data" autocomplete="off" style="width:auto;">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Company ID</span>
            <input type="text" value=<?php echo $_SESSION['username'];?> name="CompanyId" placeholder="Enter Company ID" required >
          </div>
          <?php
  require_once 'dbconnect.php';
  // echo $_SESSION['username'];
  $sql= "select * from jobdetails";
  $result = Database::$conn->query($sql);
  $rowcount=$result->num_rows ;
  // echo $rowcount;
  $comp=$_SESSION['username'];
  $compstr ="";
  $sql= "select companyname from companyprofile where companyid='$comp' ";
  $result = Database::$conn->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $compstr = $row['companyname'];
  }
  else {
    echo("Error description: " . $mysqli -> error);
  }
  // echo substr($compstr,0,3);
  $id=$_SESSION['username'].substr($compstr,0,3).$rowcount; 
  //echo $id;

  ?>
          <div class="input-box">
            <span class="details">Job ID</span>
            <input type="text" name="JobId" value=<?php echo $id;?> placeholder="Enter Job ID" >
          </div>

          <div class="input-text">
            <span class="details">Job Description</span>
            <textarea id="desc" name="desc" rows="4" cols="80"placeholder="Enter Job Description" required> </textarea>
            <!-- <input type="textarea" name="desc" placeholder="Enter Job Description" required > -->
          </div>

          <div class="input-box">
            <span class="details">Application Deadline</span>
            <input type="date" name="deadline" placeholder="Enter Application Deadline" required >
          </div>

          
          <div class="input-box">
            <span class="details">Approximate Start Date</span>
            <input type="text" name="Start" placeholder="Enter Start Time" required >
          </div>

          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name="City" placeholder="Enter City" required >
          </div>

          <div class="input-box">
            <span class="details">State</span>
            <input type="text" name="State" placeholder="Enter State" required >
          </div>

          <div class="rowform" >
            
            <div class="input-float"> 
              <span class="mark">Mode</span>
              <input type="text" name="Mode" placeholder="Online/Offline/Mixed" required>
            </div>

            <div class="input-float">
              <span class="mark">Salary</span>
              <input type="number" name="Salary" placeholder="Enter approx salary" required>
            </div>

            <div class="input-float">
              <span class="details" style="padding: 0px;">Vacancies</span>
              <input type="number" name="Vacancies" placeholder="Enter Vacancies" required>
            </div>

          </div>

          <p class="rowtitle">Eligibility Criteria</p>
          <div class="rowform">
            <div class="input-float"> 
              <span class="mark">CGPA</span>
              <input type="number" step="0.01" name="gpa" placeholder="Enter min CGPA" required>
            </div>

            <div class="input-float">
              <span class="mark">Class 12 percentage</span>
              <input type="number" step="0.01" name="mark12" placeholder="Enter min%" required>
            </div>

            <div class="input-float">
              <span class="mark">Class 10 percentage</span>
              <input type="number" step="0.01" name="mark10"  placeholder="Enter min%" required>
            </div>
          </div>
          </div>
          <p style="display: inline; margin: 20px 0; height: fit-content; font-size:18px">Department</p>
          <div class="dept-check">
            <div class="item">
              <input type="checkbox" value="CSE" id="cse" name="dept[]" class="dept" />
              <label for="cse">CSE</label>
            </div>
            
            <div class="item">
              <input type="checkbox" value="IT" id="it" name="dept[]" class="dept" />
              <label for="it">IT</label>
            </div>

            <div class="item">
              <input type="checkbox" value="ECE" id="ece" name="dept[]" class="dept" />
              <label for="ece">ECE</label>
            </div>

            <div class="item">
              <input type="checkbox" value="Mech" id="mech" name="dept[]" class="dept" />
              <label for="mech">Mechanical</label>
            </div>
            
            <div class="item">
              <input type="checkbox" value="Civil" id="civil" name="dept[]" class="dept" />
              <label for="civil">Civil</label>
            </div>
            
            <div class="item">
              <input type="checkbox" value="other" id="other" name="dept[]" class="dept" />
              <label for="other">Other</label>
              <input id='other-text' name="otherdept" placeholder='please enter department' type='text' />
            </div>

          </div>
          <div class="user-details">
          <div class="input-box">
            <span class="details">Graduation Year</span>
            <input type="text" name="GradYear" placeholder="Enter Graduation Year" required >
          </div>
          
         
        <div class="button">
          <input type="submit" name="ressub" value="Submit" style="width: 300px; margin-top: 40px;">
        </div>
        </div>
      </form>
    </div>
  </div>



</div>