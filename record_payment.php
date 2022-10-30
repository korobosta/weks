
          <h3 class="page-header">Fee Payment<small>section</small></h3> 
      <?php
            include 'process_fee_payment.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Fee Payment</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th >Student</th>
        <th >Semester</th>
         <th >Amount</th>
         <th>Paid By</th>
        <th ></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT payments.paid_by,payments.id,payments.amount,students.STUDENT_ID,user.FIRSTNAME,user.LASTNAME,grade.grade_id,grade.grade, school_year.SY_ID,school_year.school_year FROM payments JOIN students on payments.student=students.STUDENT_ID JOIN user on students.USER=user.USER_ID JOIN grade ON payments.semester=grade.grade_id JOIN school_year ON payments.school_year=school_year.SY_ID Order by payments.id ASC ");
    if(!$sql){
      echo $conn->error;
    }
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["id"] ?>" name="id" value="<?php echo $row['id'] ?>">
        <td><input id="studentname<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['FIRSTNAME'] .' '.$row['LASTNAME'] ?>" readonly></td>
        <td><input style="width:30px" id="semestername<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['grade'] ?>" readonly></td>
        <td><input id="amount<?php echo $row["id"] ?>"  name="" type="number" style="border:0px" value="<?php echo $row['amount'] ?>" readonly>
        <td>
          <input id="paid_by<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['paid_by'] ?>" readonly>
        </td>

        </td>
        <!-- <td><center><a onclick="update_fee(<?php echo $row["id"]?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td> -->
        <input id="studentid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['STUDENT_ID'] ?>" readonly>
        <input id="semesterid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['grade_id'] ?>" readonly>
        <input id="syname<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['school_year'] ?>" readonly>
        <input id="syname<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['school_year'] ?>" readonly>
        <td><a href="print.php?id=<?php echo $row['id'] ?>">Print</a></td>
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
      studenttext = $("#studentname"+i).val();
      studentvalue = $("#studentid"+i).val();

      semestertext = $("#semestername"+i).val();
      semestervalue = $("#semesterid"+i).val();

      syname = $("#syname"+i).val();
      syid = $("#syid"+i).val();

      $("#id").val($("#id"+i).val());
      $("#amt").val($("#amount"+i).val());
      $("#paid_by").val($("#paid_by"+i).val());
      $("#student").val(studentvalue).text(studenttext);
      $("#semester").val(semestervalue).text(semestertext);
      $("#school_year").val(syid).text(syname);
      $("#head").html("Update Fee");
      $("#btn_add").html("Update");
     
  
     



  }
</script>


      <div class="col-md-4" id="">
        
            <div style="background-color:rgba(208, 212, 209, 0.23);padding-left:30px" class="">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">Record Fee Payment</h3>
          <form  class="" method="post">
            <input type="hidden" id="id" name="id">
              
            
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Student</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="student" class="form-control" id="student1">
                  <option id="student"></option>
                  <?php
                  include 'db.php';
                  $sql = mysqli_query($conn,"SELECT * from students JOIN user on students.USER=user.USER_ID ORDER BY students.STUDENT_ID ASC");
                  while($row=mysqli_fetch_assoc($sql)){
                   ?>
                  <option value="<?php echo $row['STUDENT_ID'] ?>">
                  <?php echo $row['FIRSTNAME'] .' '.$row['LASTNAME'] ?>
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
                  $sql = mysqli_query($conn,"SELECT * from school_year WHERE status='Yes' ORDER BY SY_ID");
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
                  $sql = mysqli_query($conn,"SELECT * from grade WHERE status='Yes' ORDER BY grade_id");
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
              <label for="study_year" class="cols-sm-2 control-label">Study Year</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  

                  <select class="form-control" name="study_year" id="study_year1" onchange="updateAmount()">
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
              <label for="sub" class="cols-sm-2 control-label">Amount</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input class="form-control" type="number" min="1" name="amount" id="amt">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Paid By</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input class="form-control" type="text" min="1" name="paid_by" id="paid_by">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Payment Method</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="payment_method" class="form-control" id="payment_method">
                    <option>Bank</option>
                    <option>Mpesa</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Date of Payment </label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input class="form-control" type="date" name="date_of_payment" max="<?php echo date('Y-m-d') ?>" id="date_of_payment">
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


    <script type="text/javascript">
      function updateAmount(){
        var school_year=document.getElementById('school_year1').value;
        var semester=document.getElementById('semester1').value;
        var student=document.getElementById('student1').value;
        var study_year=document.getElementById('study_year1').value;

        $.ajax({
                        type: 'POST',
                        url: "process_update_amount.php",
                        data: {
                        'school_year': school_year,
                        'semester': semester,
                        'student': student,
                        'study_year': study_year,
                        },
                        success: function (response) {
                        if (response){
                            document.getElementById("amt").value = response;
                            
                        }
                         
        
                        }
                });
      }
    </script>
