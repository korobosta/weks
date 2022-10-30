
<h3 class="page-header">Fee Balance <small>section</small></h3> 
<?php
include 'process_fee_balance.php';
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
            <th >Student</th>
            <th >Course</th>
            <th >Balance</th>
            <th ></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'db.php';


          $sql=  mysqli_query($conn, "SELECT program.PROGRAM,students.STUDENT_ID as id,students.PROGRAM as program_id,students.USER,students.fee_balance,user.FIRSTNAME,user.LASTNAME from students JOIN user ON students.USER=user.USER_ID JOIN program ON students.PROGRAM=program.PROGRAM_ID WHERE students.fee_balance>1");
          while($row = mysqli_fetch_assoc($sql)) {
            $count = mysqli_num_rows($sql);
            ?>

            <tr>
             <input type="hidden" id="id<?php echo $row["id"] ?>" name="id" value="<?php echo $row['id'] ?>">
             <td><input id="studentname<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['FIRSTNAME'].' '.$row['LASTNAME'] ?>" readonly></td>
             <td><input id="coursename<?php echo $row["id"] ?>"  name="" type="text" style="border:0px" value="<?php echo $row['PROGRAM'] ?>" readonly></td>
             <td><input id="balance<?php echo $row["id"] ?>"  name="fee_balance" type="text" style="border:0px" value="<?php echo $row['fee_balance'] ?>"readonly></td>

             <td><center><a onclick="record_payment(<?php echo $row["id"]?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i>Payment</a></center></td>

             <input id="courseid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['PROGRAM_ID'] ?>" readonly>

             <input id="studentid<?php echo $row["id"] ?>"  name="" type="hidden" style="border:0px" value="<?php echo $row['PROGRAM_ID'] ?>" readonly>

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
  function record_payment(i){
    document.getElementById('form_div').style.display="";
    studenttext = $("#studentname"+i).val();
    studentvalue = i;

    semestertext = $("#semestername"+i).val();
    semestervalue = $("#semesterid"+i).val();

    syname = $("#syname"+i).val();
    syid = $("#syid"+i).val();

    //$("#id").val($("#id"+i).val());
    $("#amt").val($("#balance"+i).val());
    $("#paid_by").val($("#paid_by"+i).val());
    $("#student").val(studentvalue).text(studenttext);
    $("#semester").val(semestervalue).text(semestertext);
    $("#school_year").val(syid).text(syname);
    $("#head").html("Clear Balance");
    $("#btn_add").html("Update");
  }
</script>


<div class="col-md-4" id="">

  <div id="form_div" style="background-color:rgba(208, 212, 209, 0.23);padding-left:30px; display: none;" class="">
    <div class="row main">
      <div class="main-login main-center">
        <h3 id="head"> Fee Balance Form</h3>
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
