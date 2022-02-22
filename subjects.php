
          <h1 class="page-header">Units/Subjects</h1>
      <?php
            include 'newsubject.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">List of Units</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th style="width:20%">Units</th>
        <th style="width:10%">Applicable For</th>
        <th style="width:10%">Description</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php'; 

    
    $sql=  mysqli_query($conn, "SELECT subjects.SUBJECT_ID,subjects.SUBJECT,subjects.DESCRIPTION,program.PROGRAM,program.PROGRAM_ID,user.USER_ID,user.FIRSTNAME, user.LASTNAME FROM subjects LEFT JOIN program ON subjects.FOR=program.PROGRAM_ID JOIN user ON subjects.LECTURER=user.USER_ID Order by subjects.SUBJECT  ");
    if(!$sql){
      echo $conn->error;
    }
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["SUBJECT_ID"] ?>" name="id" value="<?php echo $row['SUBJECT_ID'] ?>">
        <td><input id="sub<?php echo $row["SUBJECT_ID"] ?>"  name="subj" type="text" style="border:0px" value="<?php echo $row['SUBJECT'] ?>" readonly></td>
          <td><input id="para<?php echo $row["SUBJECT_ID"] ?>"  name="subj" type="text" style="border:0px" value="<?php echo $row['PROGRAM'] ?>" readonly></td>
          <input id="paravalue<?php echo $row["SUBJECT_ID"] ?>"  name="paravalue" type="hidden" style="border:0px" value="<?php echo $row['PROGRAM_ID'] ?>" readonly>

          <input id="lecname<?php echo $row["SUBJECT_ID"] ?>"  name="lecname" type="hidden" style="border:0px" value="<?php echo $row['FIRSTNAME']   . ' ' . $row['LASTNAME']  ?>" readonly>
          <input id="lecid<?php echo $row["SUBJECT_ID"] ?>"  name="lecid" type="hidden" style="border:0px" value="<?php echo $row['USER_ID'] ?>" readonly>

        <td><input id="des<?php echo $row["SUBJECT_ID"] ?>" name="desc" type="text" style="border:0px;width:100%" value="<?php echo $row['DESCRIPTION'] ?>" readonly></td>
        <td><center><a onclick="update_subject(<?php echo $row["SUBJECT_ID"] ?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
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
  function update_subject($i){
    var act,sub,para,desc,i =$i;
      paratext = $("#para"+i).val();
      paravalue = $("#paravalue"+i).val();

      lectext = $("#lecname"+i).val();
      lecvalue = $("#lecid"+i).val();

      $("#id").val($("#id"+i).val());
      $("#sub").val($("#sub"+i).val());
      $("#para").val(paravalue).text(paratext);
      $("#lecturer1").val(lecvalue).text(lectext);
      $("#des").val($("#des"+i).val());
      $("#head").html("Update Subject");
      $("#btn_add").html("Update");
      //$('#para1').append($('<option>').val(paravalue).text(paratext))


  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Add New Unit</h3>
          <form class="" method="post">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Unit</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="sub" name="sub" id="sub"
                  style="width:200px"  placeholder="Enter Unit" value="<?php if(isset($_POST['sub'])){echo $_POST['sub'];} ?>"/>
                </div>
                 <p>
                  <?php if(isset($errors['sub'])){echo "<div class='erlert'><h5>" .$errors['sub']. "</h5></div>"; } ?>
                 </p>
              </div>
            </div>
            
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Course</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="f" class="form-control" id="para1">
                  <option id="para"></option>
                  <option value="">All</option>
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
              <label for="study_year" class="cols-sm-2 control-label">Study Year</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  

                  <select class="form-control" name="study_year">
                    <option></option>
                    <?php
                    include 'db.php';
                    $sql = mysqli_query($conn,"SELECT * from student_study_year ORDER BY id ASC");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                    <option value='<?php echo $row['study_year'] ?>'>Year <?php echo $row['study_year'] ?></option>
                  <?php } ?>
                  </select>
                </div>
                 <p>
                  <?php if(isset($errors['study_year'])){echo "<div class='erlert'><h5>" .$errors['study_year']. "</h5></div>"; } ?>
                 </p>
              </div>
            </div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Lecturer</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="lecturer" class="form-control" id="lecturer">
                  <option id="lecturer1"></option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * from user WHERE USER_TYPE='LECTURER'");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                  <option value="<?php echo $row['USER_ID'] ?>">
                  <?php echo $row['FIRSTNAME'].' '.$row['LASTNAME'] ?>
                  </option>
                  <?php } mysqli_close($conn); ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="des" class="cols-sm-2 control-label">Description</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <textarea type="text" class="form-control" name="des" id="des" style="width:225px;height:50px" placeholder="Enter Description" value="<?php if(isset($_POST['des'])){echo $_POST['des'];} ?>"/>
                  </textarea>
                </div>
             <p>
            <?php if(isset($errors['des'])){echo "<div class='erlert'><h5>" .$errors['des']. "</h5></div>"; } ?>
            </p>
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
 <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>
