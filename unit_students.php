<?php
include 'db.php';
$unit_id=$_GET['id'];
$unit=$conn->query("SELECT * FROM subjects WHERE SUBJECT_ID='$unit_id'");
$unit=mysqli_fetch_assoc($unit);

?>

          
          <h3 class="page-header"> Unit|Students  <small>section</small></h3> 
      <?php
            include 'process_unit_students_registration.php';
            
                ?> 
       <div class="col-md-8 " id="s_page">
        <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"> Students under <?php echo  !empty($unit['SUBJECT']) ? $unit['SUBJECT'] : ''  ?></h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Student</th>
        <th>Unit</th>
        <th>Marks</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    $stude_sql="";
    $stud_units_sql="";

     if($_SESSION['user_type'] == "STUDENT"){
        $user_id=$_SESSION['ID'];
        $student=$conn->query("SELECT STUDENT_ID,PROGRAM FROM students where USER='$user_id'");
        if(!$student){
          echo $conn->error;
        }
        $student=mysqli_fetch_assoc($student);
        $student_id=$student['STUDENT_ID'];
        $student_course_id=$student['PROGRAM'];
        $more_sql=" WHERE student=$student_id";
        $more_units_sql=" WHERE subjects.FOR='$student_course_id'";
      }

      if($_SESSION['user_type'] == "LECTURER"){
        $user_id=$_SESSION['ID'];
        $more_sql=" WHERE subjects.LECTURER=$user_id AND unit='$unit_id' ";
        $more_units_sql=" WHERE subjects.LECTURER='$user_id'";
      }

              

    
    $sql=  mysqli_query($conn, "SELECT registered_units.main_exam_marks,registered_units.cat_marks,registered_units.id,registered_units.marks,subjects.SUBJECT_ID,subjects.SUBJECT,students.STUDENT_ID,user.FIRSTNAME,user.LASTNAME FROM registered_units JOIN students ON registered_units.student=students.STUDENT_ID JOIN subjects ON registered_units.unit=subjects.SUBJECT_ID JOIN user ON students.USER=user.USER_ID $more_sql Order by registered_units.id ASC");
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
        <td>
          <th>Cat<br><?php echo $row['cat_marks'] ?></th>
          <th>Main<br><?php echo $row['main_exam_marks'] ?></th>
          <th>Total<br><?php echo $row['marks'] ?></th>
        
          <input type="hidden" id="cat_marks<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['cat_marks'] ?>" readonly >
          <input type="hidden" id="main_exam_marks<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['main_exam_marks'] ?>" readonly>
          <input type="hidden" id="marks<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['marks'] ?>" readonly >

        </td>
        <?php if($_SESSION['user_type'] != "STUDENT"){ ?>
        <td><center><a onclick="update_data(<?php echo $row["id"]?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
        <?php } ?>
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

      cat_marks = $("#cat_marks"+i).val();
      main_exam_marks = $("#main_exam_marks"+i).val();
     


      $("#id").val($("#id"+i).val());
      $("#unit").val(unitvalue).text(unittext);
      $("#student").val(studentvalue).text(studenttext);
      $("#cat_marks1").val(cat_marks);
      $("#main_exam_marks1").val(main_exam_marks);
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
                  
                  <option value="<?php echo $unit['SUBJECT_ID'] ?>">
                  <?php echo $unit['SUBJECT'] ?>
                  </option>
                  </select>
                </div>
              </div>
            </div>

           
            
            <?php if($_SESSION['user_type'] == "STUDENT"){ ?>
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
            <div class="form-group" id='cat_marks'>
              <label for="cat_marks" class="cols-sm-2 control-label">Cat Marks</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input class="form-control" type="number" name="cat_marks" min="0" max='30' id="cat_marks1">
                </div>
              </div>
            </div>
            <div class="form-group" id='main_exam_marks'>
              <label for="main_exam_marks" class="cols-sm-2 control-label">Main Exam Marks</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input class="form-control" type="number" name="main_exam_marks" min="0" max='70' id="main_exam_marks1">
                </div>
              </div>
            </div>
           
          <?php } else{ ?>
            <input class="form-control" type="hidden" name="main_exam_marks" max="70" min="0" id="main_exam_marks1">
            <input class="form-control" type="hidden" name="cat_marks" min="0" max="30" id="cat_marks1">
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


