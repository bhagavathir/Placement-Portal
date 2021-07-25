<style>
::placeholder{
  color:black;
}
input{
  color:black;
}
option {
  background-color: rgb(77, 72, 72) !important;
  color: white;
}

.rescontainer{
  max-width: 80%;
  width: 100%;
  margin: auto;
  margin-top: 50px;
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
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
  color: whitesmoke;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #950750;
   border-color: #d9d9d9;
 }

form > div.gender-details > div > label span.gender{
  color: whitesmoke;
}
 form input[type="radio"]{
   display: none;
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

form > div.user-details > div.row{
  display: grid;
  grid-template-columns: repeat(3,1fr);
  height: 80px;
  column-gap: 4px;
  margin-top: 20px;
  margin-bottom: 10px;
}

form > div.user-details > div.row > div > input[type=number]{
height: 45px;
width: 90%;
outline: none;
font-size: 16px;
border-radius: 5px;
padding-left: 15px;
border: 1px solid #ccc;
border-bottom-width: 2px;
transition: all 0.3s ease;
}

form > div.user-details > div.row > div > span{
  color: whitesmoke;
 }
/*  
body > div > div.content > form > div.user-details > div.row > div:nth-child(3) > span{
  float:right;
} */ 


form .user-details .input-file{
    height: 50px;
    width:50%;
    /* !margin-top: 15px; */
}
input[type="file"] {
  display: none;
}
.custom-file-upload {
  display: inline-block;
  cursor: pointer;
  /* outline: none; */
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  height: 45px;
  background-color: whitesmoke;
  padding-top: 2px;
  width:100%;
  padding: 12px 120px;
  color: black;
}

form.user-details.row{
  display: grid;
  grid-template-columns: repeat(3,1fr);
}


form .user-details .row .input-float{
  margin-bottom: 15px;
  width: 100%;
  display: inline;
} 

.user-details .row .input-float input:focus,
.user-details .row .input-float input:valid{
  border-color: #950740;
  
}
</style>

<div id="Students" class="portion" style="display:none">
                <!-- <h2>Students</h2>
                <p>Students section</p> -->
  <?php
    require_once 'dbconnect.php';
    $res=mysqli_query(Database::$conn,"select * from studentresume where StudentId='".$_SESSION['username']."'");
    echo mysqli_error(Database::$conn);
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
    // var_dump($row);
  ?>
  <div class="rescontainer">
    <div class="title">Resume Details</div>
    <div class="content">
      <form action="../form/formsub.php" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="user-details">

          <div class="input-box">
            <span class="spandetails">Student ID</span>
            <input type="text" name="studentid" value="<?php echo $_SESSION['username'];?>" placeholder="Enter your ID" required id="studentid">
          </div>
          

          <div class="input-box">
            <span class="spandetails">Department</span>
            <input type="text" name="dept" value="<?php if($row) {echo $row['Department'];}?>" placeholder="Enter your Department" required id="Department">
          </div>

          
          <div class="input-box">
            <span class="spandetails">Year of Graduation</span>
            <input type="text" name="gradyear" value="<?php if($row) {echo $row['GradYear'];}?>" placeholder="Enter year of Graduation" required id="gradyear">
          </div>

          <div class="row" >
            
            <div class="input-float"> 
              <span class="mark">CGPA</span>
              <input type="number" step="0.01" name="gpa" value="<?php if($row) {echo $row['CGPA'];}?>" placeholder="Enter your CGPA" required>
            </div>

            <div class="input-float">
              <span class="mark">Class 12 percentage</span>
              <input type="number" step="0.01" name="mark12" value="<?php if($row) {echo $row['mark12'];}?>" placeholder="Enter %" required>
            </div>

            <div class="input-float">
              <span class="mark">Class 10 percentage</span>
              <input type="number" step="0.01" name="mark10" value="<?php if($row) {echo $row['mark10'];}?>" placeholder="Enter %" required>
            </div>

         </div>

          
        <div class ="input-box input-file">
          <span class="spandetails">Uplaod Resume</span>
          <p style="color: grey; font-size: smaller;">Upload .pdf file</p>
        <input id="file-upload" value="<?php if($row) {echo $row['file'];}?>" type="file" name="resumefile" required accept=".pdf" />
        <label for="file-upload" class="custom-file-upload">
            Upload
        </label>
        <div id="file-upload-filename"><?php if($row) {echo $row['filename'];}?></div>
         
        </div>
        
        
        <div class="button">
          <input type="submit" name="ressub" value="Submit" style="width:200px;margin-top: 10px;">
        </div>
      
      </div>
      </form>
    </div>
  </div>

</div>
