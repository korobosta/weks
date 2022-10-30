<?php session_start(); 
include 'db.php';
$courses=$conn->query("SELECT PROGRAM_ID,PROGRAM from program");
$studs=$conn->query("SELECT user.FIRSTNAME,user.LASTNAME,user.MIDDLE_NAME,students.STUDENT_ID from students join user on students.USER=user.USER_ID ");

$sub_query=" WHERE payments.amount !='' ";

if(isset($_POST['subject_id'])){
  $subject_id=$_POST['subject_id'];
  if($subject_id != ''){
    $sub_query=$sub_query.' AND students.PROGRAM='.$subject_id;
  }
}

if(isset($_POST['stud_id'])){
  $stud_id=$_POST['stud_id'];
  if($stud_id != ''){
    $sub_query=$sub_query.' AND payments.student='.$stud_id;
  }
}
?>
<style type="text/css">
  @media print {  
    @page {
     size:8.5in 14in;
     max-width:8.5in;
   }
 }
 #stud{
   width:8.5in;
   height:14in;
   overflow:hidden;
   margin:auto;
   border:2px solid #000;
   background-color:white;
 }
</style>

<h1 class="page-header">Fee Payments    
  <button type="text" class="btn btn-info" onclick="printContent('stud')" >
    <i class="glyphicon glyphicon-print"></i>PRINT</button>
  </h1>

  <div class="col-md-4" id="">
  <div style="background-color:rgba(208, 212, 209, 0.23);padding-left:30px">
    <div class="row main">
      <div class="main-login main-center">
        <h3 id="head">Filter</h3>
        <form class="" method="post">
          <div class="form-group">
            <label for="sub" class="cols-sm-2 control-label">Course</label>
            <div class="cols-sm-4">
              <div class="input-group">
                <select name="subject_id" class="form-control">
                  <option value="">Select Course</option>
                  <?php while($course=mysqli_fetch_array($courses)) { ?>
                    <option value="<?php echo $course['PROGRAM_ID'] ?>"><?php echo $course['PROGRAM'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="sub" class="cols-sm-2 control-label">Student</label>
            <div class="cols-sm-4">
              <div class="input-group">
                <select name="stud_id" class="form-control">
                  <option value="">Select Student</option>
                  <?php while($stu=mysqli_fetch_array($studs)) { ?>
                    <option value="<?php echo $stu['STUDENT_ID'] ?>"><?php echo $stu['FIRSTNAME']. ' ' .$stu['MIDDLE_NAME']. ' '.$stu['LASTNAME'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group ">
            <button type="submit" name="verify" class="btn btn-info" id="btn_add">Filter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  
  <div class="container">
   
    <div class="row">
     <div class="col-sm-3">
      <div class="input-group">
      </div>
    </div>

    <br> <br>
    <div class="col-md-8" id="stud" style="padding:50px">   
      <img style="margin-left: 40%;" src="asset/images/logo.png"><br><br>
      <div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">

       <table> 
         <tr>
          <td style="width:20%;">
            
          </td>
          <td style="width:400px;font-size:12px;line-height:1mm;text-align:center" >
            <p><b>WEKS COLLEGE</b></p> 
            <p style="padding:5px; font-weight: bold; color:green" >Payments Report</p>
          </td>
          
       </tr>
     </table>
     <?php 
      $sy=$conn->query("SELECT  DISTINCT payments.school_year from payments");


      while($row7=mysqli_fetch_array($sy)){
        $school_year_f=$row7['school_year'];
        $row5=$conn->query("SELECT school_year FROM school_year WHERE SY_ID='$school_year_f'");
        $school_year=mysqli_fetch_assoc($row5);
        $school_year=$school_year['school_year'];
        ?>
        <hr>
        <h3 style="text-align:center;"><?php echo $school_year ?></h3>
        <hr>
     <table id="students" class="table table-bordered" >
      <thead>
        <tr id="heads">
          <td style="width:10%">Student</td>
          <td style="width:10%">Course</td>
          <td style="width:10%">Amount</td>
            <!-- <td style="width:10%">Academic Year</th>
              <td style="width:10%">Semester</th>
                <td style="width:10%">Study Year</th> -->
                  <td style="width:10%">Payment Date</th>


                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'db.php';
                  
                  $sql=  mysqli_query($conn, "SELECT * FROM payments left join grade on payments.semester=grade.grade_id JOIN school_year ON payments.school_year=school_year.SY_ID JOIN  students ON payments.student=students.STUDENT_ID join user on students.USER=user.USER_ID left join program on students.PROGRAM=program.PROGRAM_ID $sub_query");
                  if(!$sql){
                    echo $conn->error;
                  }
                  while($row = mysqli_fetch_assoc($sql)) {
       // $sql2=  mysqli_query($conn, "SELECT * FROM student_info left join program on student_info.PROGRAM=program.PROGRAM_ID WHERE STUDENT_ID = '".$row['STUDENT_ID']."' ");
       //   while($row2 = mysqli_fetch_assoc($sql2)) {


                    ?>
                    <tr>

                      <td><?php echo $row['LASTNAME'] . ' ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
                      <td><?php echo $row['PROGRAM'] ?></td>
                      <td><?php echo $row['amount'] ?></td>
                      <!-- <td><?php echo $row['school_year'] ?></td>
                      <td><?php echo $row['grade'] ?></td>
                      <td><?php echo $row['study_year'] ?></td> -->
                      <td><?php echo $row['payment_date'] ?></td>
                    </tr>
                    <?php
    // }
                  } mysqli_close($conn);
                  ?>
                  
                </tbody>
              </table>
            <?php } ?>
            </div>
          </div>
        </div>         
      </div>

      <script>
        function Search() {
          var input, filter, found, table, tr, td, i, j;
          input = document.getElementById("Search");
          filter = input.value.toUpperCase();
          table = document.getElementById("students");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
              if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
              }
            }
            if (found) {
              tr[i].style.display = "";
              found = false;
            } else {
             if (tr[i].id != 'heads'){tr[i].style.display = "none";}
           }
         }
       }
     </script>
     <script>
      function printContent(el){
       var restorepage = document.body.innerHTML;
       var printcontent = document.getElementById(el).innerHTML;
       document.body.innerHTML = printcontent;
       window.print();
       document.body.innerHTML = restorepage;
     }
   </script>
