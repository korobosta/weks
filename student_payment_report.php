<?php session_start(); 
$user_id=$_SESSION['ID'];
$student=$conn->query("SELECT students.STUDENT_ID,students.PROGRAM,program.PROGRAM FROM students JOIN program ON students.PROGRAM=program.PROGRAM_ID where students.USER='$user_id'");
if(!$student){
  echo $conn->error;
}
$student=mysqli_fetch_assoc($student);
$student_id=$student['STUDENT_ID'];
$student_course=$student['PROGRAM'];

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

            
          <div class="container">
         
          <div class="row">
          	<div class="col-sm-3">
        <div class="input-group">
    </div>
    </div>

		<br> <br>
       <div class="col-md-8" id="stud" style="padding:50px">   
       <div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">

       <table>
	<tr>
		<td style="width:20%;">
		
		</td>
		<td style="width:800px;font-size:12px;line-height:1mm;text-align:center" >
		<p><b>WEKS COLLEGE</b></p>
		<p style="padding:5px; font-weight: bold; color:green" >Fee Payments for <?php echo $_SESSION['fname']. ' '.$_SESSION['lname']  ?></p>
		<p style="padding:10px; font-weight: bold; color:teal"><?php echo $student_course  ?></p>	
		</td>
		<td style="width:20%;">
			<br>
			<?php
			include 'db.php';
			$id = $_GET['id'];
			$sql = mysqli_query($conn,"SELECT * from student_info where STUDENT_ID = '$id'");
			while($row = mysqli_fetch_assoc($sql)){
			?>
			<label style="font-size:13px">LRN#:</label>
			<label style="font-size:13px" for=""><?php echo $row['LRN_NO'] ?></label>
			<?php 
			} ?>
		</td>
	</tr>
</table>
  <table id="students" class="table table-bordered" >
    <thead>
      <tr id="heads">
        <td style="width:10%">Amount</th>
        <td style="width:10%">Academic Year</th>
        <td style="width:10%">Semester</th>
        <td style="width:10%">Study Year</th>
        <td style="width:10%">Payment Date</th>


      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    
    $sql=  mysqli_query($conn, "SELECT * FROM payments left join grade on payments.semester=grade.grade_id JOIN school_year ON payments.school_year=school_year.SY_ID JOIN  students ON payments.student=students.STUDENT_ID join user on students.USER=user.USER_ID WHERE payments.student = '$student_id'");
    if(!$sql){
      echo $conn->error;
    }
    while($row = mysqli_fetch_assoc($sql)) {
       // $sql2=  mysqli_query($conn, "SELECT * FROM student_info left join program on student_info.PROGRAM=program.PROGRAM_ID WHERE STUDENT_ID = '".$row['STUDENT_ID']."' ");
       //   while($row2 = mysqli_fetch_assoc($sql2)) {


    ?>
      <tr>

        <!-- <td><?php echo $row2['LASTNAME'] . ' ' . $row2['FIRSTNAME']. ' ' . $row2['MIDDLENAME'] ?></td>-->
        <td><?php echo $row['amount'] ?></td>
        <td><?php echo $row['school_year'] ?></td>
        <td><?php echo $row['grade'] ?></td>
        <td><?php echo $row['study_year'] ?></td>
        <td><?php echo $row['payment_date'] ?></td>
      </tr>
      <?php
    // }
    } mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
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
