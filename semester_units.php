
          <h3 class="page-header">Semester Units <small>section</small></h3> 
      <?php
            include 'process_semester_units.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Semester Units</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th >Unit</th>
        <th >Semester</th>
        <th ></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT semester_units.id,grade.grade_id,grade.grade,subjects.SUBJECT_ID,subjects.SUBJECT FROM semester_units JOIN grade ON semester_units.semester=grade.grade_id JOIN subjects ON semester_units.unit=subjects.SUBJECT_ID Order by semester_units.id ASC");
    if(!$sql){
      echo $conn->error;
    }
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["id"] ?>" name="id" value="<?php echo $row['id'] ?>">
        <td><input id="unitname<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['SUBJECT'] ?>" readonly></td>
        <td><input id="semestername<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['grade'] ?>" readonly></td>
        
        <td><center><a onclick="update_data(<?php echo $row["id"]?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
        <input id="unitid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['SUBJECT_ID'] ?>" readonly>
        <input id="semesterid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['grade_id'] ?>" readonly>
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

      semestertext = $("#semestername"+i).val();
      semestervalue = $("#semesterid"+i).val();


      $("#id").val($("#id"+i).val());
      $("#unit").val(unitvalue).text(unittext);
      $("#semester").val(semestervalue).text(semestertext);
      $("#head").html("Update Fee");
      $("#btn_add").html("Update");
     
  
     



  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Configure Semester Units</h3>
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

            
  

            <div class="form-group ">
            <input type="reset" class="btn btn-info " id="reset" name="reset" value="Cancel">
              <button class="btn btn-info" id="btn_add">Add</button>
            </div>
            
          </form>
        </div>
      </div>

    </div>
    </div>
