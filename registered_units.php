
          <h3 class="page-header"> Registerd Units <small>section</small></h3> 
      <?php
            include 'process_units_registration.php';
            
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"> Registerd Units</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Student</th>
        <th >Unit</th>
        <th >Marks</th>
        <th ></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT registered_units.id,registered_units.marks,subjects.SUBJECT_ID,subjects.SUBJECT,students.STUDENT_ID,user.FIRSTNAME,user.LASTNAME FROM registered_units JOIN students ON registered_units.student=students.STUDENT_ID JOIN subjects ON registered_units.unit=subjects.SUBJECT_ID JOIN user ON students.USER=user.USER_ID Order by registered_units.id ASC");
    if(!$sql){
      echo $conn->error;
    }
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["id"] ?>" name="id" value="<?php echo $row['id'] ?>">
        <td><input id="studentname<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['FIRSTNAME'].' '.$row['LASTNAME'] ?>" readonly></td>
        <td><input id="unitname<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['SUBJECT'] ?>" readonly></td>
        <td><input id="marks<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['marks'] ?>" readonly></td>
        
        <td><center><a onclick="update_data(<?php echo $row["id"]?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
        <input id="studentid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['STUDENT_ID'] ?>" readonly>
        <input id="unitid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['SUBJECT_ID'] ?>" readonly>
      </tr>
    
      <?php
    
    }
     mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>

<script>
  function update_data($i){
      var i = $i;
      unittext = $("#unitname"+i).val();
      unitvalue = $("#unitid"+i).val();

      studenttext = $("#studentname"+i).val();
      studentvalue = $("#studentid"+i).val();


      $("#id").val($("#id"+i).val());
      $("#unit").val(unitvalue).text(unittext);
      $("#student").val(studentvalue).text(studenttext);
      $("#head").html("Update Record");
      $("#btn_add").html("Update");

  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Register Unit</h3>
          <form class="" method="post">
            <input type="hidden" id="id" name="id">
              
            
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Unit</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="unit" class="form-control" id="unit1">
                  <option id="unit"></option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * from subjects ORDER BY SUBJECT_ID");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                  <option value="<?php echo $row['SUBJECT_ID'] ?>">
                  <?php echo $row['SUBJECT'] ?>
                  </option>
                  <?php } mysqli_close($conn); ?>
                  </select>
                </div>
              </div>
            </div>

           
            <?php if($_SESSION['user_type'] == "STUDENT"){
              $user_id=$_SESSION['ID'];
              include 'db.php';
              $student=$conn->query("SELECT STUDENT_ID FROM students where USER='$user_id'");
              if(!$student){
                echo $conn->error;
              }
              $student=mysqli_fetch_assoc($student);
              $student_id=$student['STUDENT_ID'];

              ?>

              <input type="hidden" name="student" value="<?php echo $student_id ?>">
            <?php } else{ ?>
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Student</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="student" class="form-control" id="student1">
                  <option id="student"></option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * from students JOIN user ON students.user=user.USER_ID");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                  <option value="<?php echo $row['STUDENT_ID'] ?>">
                  <?php echo $row['FIRSTNAME'].' '.$row['LASTNAME'] ?>
                  </option>
                  <?php } mysqli_close($conn); ?>
                  </select>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php if($_SESSION['user_type'] == "LECTURER") { ?>
          <div class="form-group" id=marks>
              <label for="sub" class="cols-sm-2 control-label">Marks</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input class="form-control" type="number" name="marks" min="1">
                </div>
              </div>
            </div>
          <?php } else{ ?>
            <input class="form-control" type="hidden" name="marks" min="1">
          <?php } ?>

            <div class="form-group ">
            <input type="reset" class="btn btn-info " id="reset" name="reset" value="Cancel">
              <button class="btn btn-info" id="btn_add">Add</button>
            </div>
            
          </form>
        </div>
      </div>

    </div>
    </div>
