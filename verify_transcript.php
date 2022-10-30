<div class="col-md-4" id="">
<div style="background-color:rgba(208, 212, 209, 0.23);padding-left:30px">
  <div class="row main">
    <div class="main-login main-center">
      <h3 id="head">Validate transcript</h3>
      <form class="" method="post" action="rms.php?page=verify_transcript">
        <div class="form-group">
          <label for="sub" class="cols-sm-2 control-label">Verification Code</label>
          <div class="cols-sm-4">
            <div class="input-group">
              <input name="ID" class="form-control" type="text">
            </div>
          </div>
        </div>
        <div class="form-group ">
          <button type="submit" name="verify" class="btn btn-info" id="btn_add">Verify</button>
        </div>
        
      </form>
    </div>
  </div>

</div>
</div>
<?php session_start(); 
if(isset($_POST['verify'])){
$user_id=$_POST['ID'];
$student=$conn->query("SELECT user.FIRSTNAME, user.MIDDLE_NAME,user.LASTNAME,students.STUDENT_ID,students.REGISTRATION_NUMBER,students.PROGRAM,program.PROGRAM FROM students JOIN program ON students.PROGRAM=program.PROGRAM_ID JOIN user ON students.USER=user.USER_ID where students.STUDENT_ID='$user_id'");
if(!$student){
  echo $conn->error;
}
$student=mysqli_fetch_assoc($student);
$student_id=$student['STUDENT_ID'];
$student_course=$student['PROGRAM'];
include 'grade_calculator.php';

?>
<style type="text/css">
  @media print {  
    @page {
     size:8.5in 14in;
     max-width:8.5in;
   }
 }
 #stud{
   width:10.5in;
   height:14in;
   overflow:hidden;
   margin:auto;
   border:2px solid #000;
   background-color:white;
 }
</style>

<div  class="container">
<div class="row">
  <div class="col-sm-3">
    <div class="input-group"></div>
  </div>

  <br> <br>
  <div class="col-md-8" id="stud" style="padding:50px">  
   <img style="margin-left: 40%;" src="asset/images/logo.png"><br><br>
   <div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">


     <table>
       <tr>
        <td style="width:20%;">  </td>
        <td style="width:500px;font-size:12px;line-height:1mm;text-align:center" >
          <p><b>WEKS COLLEGE</b></p><br><br>
          <p style="padding:5px; font-weight: bold;font-size: 20px;" >Transcript</p>
        </td>
      </tr>
    </table>
    <hr>
    <b>Student : </b><?php echo $student['FIRSTNAME']. ' '.$student['MIDDLE_NAME'] .' '.$student['LASTNAME']  ?>
    <p style="float:right"><b >Registration Number : </b><?php echo $student['REGISTRATION_NUMBER'] ?></p>
    <hr>
    <?php 
    $sy=$conn->query("SELECT  DISTINCT registered_units.school_year from registered_units WHERE registered_units.student='$student_id'");


    while($row7=mysqli_fetch_array($sy)){
      $school_year_f=$row7['school_year'];
      $row5=$conn->query("SELECT school_year FROM school_year WHERE SY_ID='$school_year_f'");
      $school_year=mysqli_fetch_assoc($row5);
      $school_year=$school_year['school_year'];
      ?>
      <hr>
      <h3 style="text-align:center;"><?php echo $school_year ?></h3>
      <hr>
      <?php
      $sm=$conn->query("SELECT DISTINCT semester from registered_units  WHERE student='$student_id' AND school_year='$school_year_f'");


      while($row6=mysqli_fetch_array($sm)){
        $semester_f=$row6['semester'];
        $row6=$conn->query("SELECT grade FROM grade WHERE grade_id='$semester_f'");
        $semesters=mysqli_fetch_assoc($row6);
        $semester=$semesters['grade'];

        ?>
        <hr>
        <h4 style="text-align:center;">Semester <?php echo $semester ?></h4>
        <hr>
        <table id="students" class="table table-bordered" >
          <thead>
            <tr id="heads">
              <td style="width:20%">Unit</th>
                <td style="width:10%">Marks/Grade</th>
      <!-- <td style="width:10%">Academic Year</th>
      <td style="width:10%">Semester</th>
        <td style="width:10%">Study Year</th> -->
        </tr>
      </thead>
      <tbody>
        <?php

        $sql=  mysqli_query($conn, "SELECT * FROM registered_units left join grade on registered_units.semester=grade.grade_id JOIN school_year ON registered_units.school_year=school_year.SY_ID JOIN subjects ON registered_units.unit=subjects.SUBJECT_ID JOIN students ON registered_units.student=students.STUDENT_ID join user on students.USER=user.USER_ID WHERE registered_units.student = '$student_id' AND registered_units.semester='$semester_f' AND registered_units.school_year='$school_year_f'");

        while($row = mysqli_fetch_assoc($sql)) {


          ?>
          <tr>
            <td><?php echo $row['SUBJECT'] ?></td>
            <td><?php echo $row['marks'] ?> <?php echo calculate_grade($row['marks']);  ?></td>
      <!-- <td><?php echo $row['school_year'] ?></td>
      <td><?php echo $row['grade'] ?></td>
      <td><?php echo $row['study_year'] ?></td> -->
    </tr>
    <?php
  }
  ?>
  
</tbody>
</table>
<?php
}
}
?>


</div>
</div>
</div>         
</div>

<?php } ?>

