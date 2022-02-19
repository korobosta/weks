
          <h3 class="page-header">Fee Configured <small>section</small></h3> 
      <?php
            include 'process_fee_configuration.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Fees</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th >Course</th>
        <th >Semester</th>
         <th >Amount</th>
        <th ></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT fee.id,fee.amount,program.PROGRAM,program.PROGRAM_ID,grade.grade_id,grade.grade, school_year.SY_ID,school_year.school_year FROM fee JOIN program on fee.course=program.PROGRAM_ID JOIN grade ON fee.semester=grade.grade_id JOIN school_year ON fee.school_year=school_year.SY_ID Order by fee.id ASC ");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["id"] ?>" name="id" value="<?php echo $row['id'] ?>">
        <td><input id="coursename<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['PROGRAM'] ?>" readonly></td>
        <td><input id="semestername<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['grade'] ?>" readonly></td>
        <td><input id="amount<?php echo $row["id"] ?>"  name="" type="number" style="border:0px" value="<?php echo $row['amount'] ?>" readonly></td>
        <td><center><a onclick="update_fee(<?php echo $row["id"]?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
        <input id="courseid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['PROGRAM_ID'] ?>" readonly>
        <input id="semesterid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['grade_id'] ?>" readonly>
        <input id="syid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['SY_ID'] ?>" readonly>
        <input id="syname<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['school_year'] ?>" readonly>
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
  function update_fee($i){
      var i = $i;
      coursetext = $("#coursename"+i).val();
      coursevalue = $("#courseid"+i).val();

      semestertext = $("#semestername"+i).val();
      semestervalue = $("#semesterid"+i).val();

      syname = $("#syname"+i).val();
      syid = $("#syid"+i).val();

      $("#id").val($("#id"+i).val());
      $("#amt").val($("#amount"+i).val());
      $("#course").val(coursevalue).text(coursetext);
      $("#semester").val(semestervalue).text(semestertext);
      $("#school_year").val(syid).text(syname);
      $("#head").html("Update Fee");
      $("#btn_add").html("Update");
     
  
     



  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Configure New Fee</h3>
          <form class="" method="post">
            <input type="hidden" id="id" name="id">
              
            
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Course</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="course" class="form-control" id="course1">
                  <option id="course"></option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * from program ORDER BY PROGRAM");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                  <option value="<?php echo $row['PROGRAM_ID'] ?>">
                  <?php echo $row['PROGRAM'] ?>
                  </option>
                  <?php } mysqli_close($conn); ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">School Year</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="school_year" class="form-control" id="school_year1">
                  <option id="school_year"></option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * from school_year ORDER BY SY_ID");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                  <option value="<?php echo $row['SY_ID'] ?>">
                  <?php echo $row['school_year'] ?>
                  </option>
                  <?php } mysqli_close($conn); ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Semester</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="semester" class="form-control" id="semester1">
                  <option id="semester"></option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * from grade ORDER BY grade_id");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                  <option value="<?php echo $row['grade_id'] ?>">
                  <?php echo $row['grade'] ?>
                  </option>
                  <?php } mysqli_close($conn); ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Amount</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input class="form-control" type="number" min="1" name="amount" id="amt">
                </div>
              </div>
            </div>
  

            <div class="form-group ">
            <input type="reset" class="btn btn-info " id="reset" name="reset" value="Cancel">
              <button class="btn btn-info" id="btn_add">Add</button>
            </div>
            
          </form>
        </div>
      </div>

    </div>
    </div>
