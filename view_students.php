<div class="modal-body"> 

    <?php
    include 'db.php';
    $id = $_POST['id'];

  if($_POST['id']){
    $sql = mysqli_query($conn, "SELECT * from students join program on students.PROGRAM = program.PROGRAM_ID JOIN user on students.USER=user.USER_ID where students.STUDENT_ID = '$id'");
    if(!$sql){
      echo $conn->error;
    }
    while($row = mysqli_fetch_assoc($sql)){
     ?>
         <input type="hidden" name="id" value="<?php echo $id ?>">
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Reg No.:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['REGISTRATION_NUMBER'] ?>

            
          </div>

         </div>
         <br>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Name:</label>
         </div>
         <div class="col-md-4 text-left">
         <?php echo $row['LASTNAME'].", ".$row['FIRSTNAME']." ".$row['MIDDLE_NAME']; ?>
    
          </div>
        </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Gender:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['GENDER'] ?>
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-5 text-right">
         <label>Date of Birth:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['DOB'] ?>
          <label></label>
            
          </div>

         </div>
         
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Address:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['ADDRESS'] ?>
          <label></label>
            
          </div>

         </div>


        <div class="row">
         <div class="col-md-5 text-right">
         <label>Parent or Guardian:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['PG_NAME'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>Parent or Guardian Address:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['PG_ADDRESS'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>Parent or Guardian Phone:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['PG_PHONE'] ?>
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-5 text-right">
         <label>High School/Secondary:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['HS_NAME'] ?>
          <label></label>
            
          </div>

         </div>

         
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Year Completed:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['HS_YEAR_COMPLETED'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>KSCE GRADE:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['HS_GRADE'] ?>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Curriculum/Course Enrolled:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['PROGRAM'] ?>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-8 text-right">
         <!-- <button type="submit" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Update</button> -->
          
          </div>

         </div>
         </div>
         </div>
         <div class="modal-footer">
           <a  class="btn btn-default" href="rms.php?page=student_p&id=<?php echo $id ?>">Update</a>
                  
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
         </div>
        
       

        

    <?php
    }
    } mysqli_close($conn);
     ?>



 